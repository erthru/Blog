<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;
use App\Quote;
use App\Tag;
use App\Writer;

class ContentController extends Controller
{
    public function index()
    {
        $contents = Content::with("writer")->orderBy("id", "DESC")->paginate(5);
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
                "content" => "null",
                "quote" => $quote,
                "created_at" => strtok($quote->created_at, "T"),
                "updated_at" => strtok($quote->updated_at, "T"),
            ]);
        } 

        usort($mix, $this->buildSorter("created_at"));

        $data = [
            "mix" => (object) $mix
        ];

        return view("index.list", $data);
    }

    public function detailView($name)
    {
        $fixName = preg_replace('/[\-]/', ' ', $name);
        $content = Content::with("writer")->with("tag")->where("title", $fixName)->first();
        
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
        $this->checkAuth($request);

        $writer = Writer::find($request->session()->get("id"));
        $content = Content::with("writer")->orderBy("id", "DESC")->paginate(15);

        $data = [
            "writer" => $writer,
            "content" => $content
        ];

        return view("dashboard.content", $data);
    }

    public function dashboardContentAddView(Request $request)
    {
        $this->checkAuth($request);
        return view("dashboard.content_add");
    }

    public function addAction(Request $request)
    {
        $this->checkAuth($request);

        $writer = Writer::find($request->session()->get("id"));

        $thumbnail = "default_thumbnail.jpg";

        if($request->hasFile("thumbnail")){
            $thumbnail = uniqid(). ".jpg";

            if($request->file("thumbnail")->getClientOriginalExtension() == "jpg" || $request->file("thumbnail")->getClientOriginalExtension() == "jpeg"){
                imagejpeg(imagecreatefromjpeg($request->file("thumbnail")),"img/".$thumbnail,50);
            }else{
                imagepng(imagecreatefrompng($request->file("thumbnail")),"img/".$thumbnail,5);
            }
        }

        $body = [
            "title" => $request->input("title"),
            "body" => $request->input("body"),
            "thumb" => $thumbnail,
            "is_page" => $request->input("isPage") ?: 0,
            "writer_id" => $writer->id
        ];

        Content::create($body);

        return redirect("/dashboard/content")->with("successMsg", "Data ditambahkan.");
    }
}
