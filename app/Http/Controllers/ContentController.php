<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Content;
use App\Quote;
use App\Tag;
use App\Writer;

class ContentController extends Controller
{
    public function homeView()
    {
        $contents = Content::with("writer")->orderBy("id", "DESC")->where("is_page", "0")->paginate(5);
        $quotes = Quote::with("writer")->orderBy("id", "DESC")->paginate(4);

        $mix = [];

        foreach($contents as $content){
            array_push($mix, [
                "type" => "content",
                "content" => $content,
                "quote" => null,
                "created_at" => strtok($content->created_at, "T"),
                "updated_at" => strtok($content->updated_at, "T"),
            ]);
        } 

        foreach($quotes as $quote){
            array_push($mix, [
                "type" => "quote",
                "content" => null,
                "quote" => $quote,
                "created_at" => strtok($quote->created_at, "T"),
                "updated_at" => strtok($quote->updated_at, "T"),
            ]);
        } 

        usort($mix, $this->buildSorter("created_at"));

        $data = [
            "mix" => (object) $mix
        ];

        return view("index.home", $data);
    }

    public function detailView($url)
    {
        $content = Content::with("writer")->with("tag")->where("for_url", $url)->first();
        
        if($content){
            $tagFromContent = "";

            foreach($content->tag as $tag){
                $tagFromContent .= "'" . $tag->name . "',";
            }

            $tagFromContent = substr($tagFromContent, 0, -1);
            
            $related = empty($tagFromContent) ? null : Tag::with("content")->whereRaw("name IN ($tagFromContent) AND content_id != " . $content->id)->groupBy("content_id")->take(3)->get();

            $data = [
                "content" => $content,
                "related" => $related
            ];

            return view("index.detail", $data);
        }else{
            abort(404);
        }
    }

    public function dashboardContentView(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $writer = Writer::find($request->session()->get("id"));
        $contents = null;

        if(!empty($request->query("is_page"))){
            if($request->query("is_page") == "1"){
                $contents = Content::with("writer")->where("is_page", "1")->orderBy("id", "DESC")->paginate(10);
            }else{
                $contents = Content::with("writer")->where("is_page", "0")->orderBy("id", "DESC")->paginate(10);
            }
        }else{
            $contents = Content::with("writer")->orderBy("id", "DESC")->paginate(10);
        }

        if(!empty($request->query("query"))){
            $contents = Content::with("writer")
            ->where("title", "LIKE", "%" . $request->query("query") . "%")
            ->orWhere("body", "LIKE", "%" . $request->query("query") . "%")
            ->orderBy("id", "DESC")
            ->take(15)
            ->get();
        }
        
        $data = [
            "writer" => $writer,
            "contents" => $contents
        ];

        return view("dashboard.content", $data);
    }

    public function dashboardContentAddView(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $writer = Writer::find($request->session()->get("id"));
        $data = [
            "writer" => $writer
        ];
        
        return view("dashboard.content_add", $data);
    }

    public function dashboardContentUpdateView(Request $request, $id)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $content = Content::with("writer")->with("tag")->find($id);

        $data = [
            "content" => $content,
            "writer" => $content->writer
        ];

        return view("dashboard.content_update", $data);
    }

    public function addAction(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }
        
        $this->validate($request, [
            "title" => "required",
            "body" => "required"
        ],$this->validationErrorMsg());

        $writer = Writer::find($request->session()->get("id"));

        $thumbnail = "";

        if($request->hasFile("thumbnail")){
            $thumbnail = uniqid(). ".jpg";

            if($request->file("thumbnail")->getClientOriginalExtension() == "jpg" || $request->file("thumbnail")->getClientOriginalExtension() == "jpeg"){
                imagejpeg(imagecreatefromjpeg($request->file("thumbnail")),"img/".$thumbnail,50);
            }else{
                imagepng(imagecreatefrompng($request->file("thumbnail")),"img/".$thumbnail,5);
            }
        }

        $forUrl = strtolower(preg_replace('/[^A-Za-z0-9\-]/', "", preg_replace('/\s+/', '-', $request->input("title"))));
        
        if(substr($forUrl, -1) == "-"){
            $forUrl = substr($forUrl, 0, -1);
        }

        $content = Content::where("for_url", $forUrl)->get()->count();

        if($content > 0){
            $forUrl .= uniqid();
        }

        DB::beginTransaction();

        $contentBody = [
            "title" => $request->input("title"),
            "body" => $request->input("body"),
            "thumb" => $thumbnail,
            "is_page" => $request->input("isPage") ?: 0,
            "for_url" => $forUrl,
            "writer_id" => $writer->id
        ];
        
        $content = Content::create($contentBody);

        $tags = preg_replace('/\s+/', '', $request->input("tags"));

        if($tags != ""){
            if(substr($tags, -1) == ","){
                $tags = substr($tags, 0, -1);
            }
    
            $tagsArr = explode(",", $tags);
            
            $tagBody = [];
    
            foreach($tagsArr as $tag){
                array_push($tagBody, [
                    "name" => $tag,
                    "content_id" => $content->id
                ]);
            }
    
            foreach($tagBody as $tag){
                Tag::updateOrCreate($tag);
            }
        }

        DB::commit();

        return redirect("/dashboard/content")->with("successMsg", "Data ditambahkan.");
    }

    public function updateAction(Request $request, $id)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $this->validate($request, [
            "title" => "required",
            "body" => "required"
        ],$this->validationErrorMsg());

        $content = Content::find($id);

        $thumbnail = $content->thumb;

        if($request->hasFile("thumbnail")){
            $thumbnail = uniqid(). ".jpg";

            if($request->file("thumbnail")->getClientOriginalExtension() == "jpg" || $request->file("thumbnail")->getClientOriginalExtension() == "jpeg"){
                imagejpeg(imagecreatefromjpeg($request->file("thumbnail")),"img/".$thumbnail,50);
            }else{
                imagepng(imagecreatefrompng($request->file("thumbnail")),"img/".$thumbnail,5);
            }
        }

        DB::beginTransaction();

        $contentBody = [
            "title" => $request->input("title"),
            "body" => $request->input("body"),
            "thumb" => $thumbnail
        ];
        
        $content->update($contentBody);

        $tags = preg_replace('/\s+/', '', $request->input("tags"));

        if($tags != ""){
            if(substr($tags, -1) == ","){
                $tags = substr($tags, 0, -1);
            }
    
            $tagsArr = explode(",", $tags);
            
            $tagBody = [];
    
            foreach($tagsArr as $tag){
                array_push($tagBody, [
                    "name" => $tag,
                    "content_id" => $content->id
                ]);
            }
    
            foreach($tagBody as $tag){
                Tag::updateOrCreate($tag);
            }
        }

        DB::commit();

        return redirect("/dashboard/content")->with("successMsg", "Data diperbarui.");
    }

    public function deleteAction(Request $request, $id)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $content = Content::find($id);
        $content->delete();

        return redirect("/dashboard/content")->with("successMsg", "Data dihapus");
    }
}
