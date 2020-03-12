<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Writer;
use App\Tag;

class TagController extends Controller
{
    public function dashboardTagView(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $writer = Writer::find($request->session()->get("id"));
        $tags = Tag::select("*")->selectSub("COUNT(*)", "_total")->groupBy("name")->orderBy("id", "DESC")->get();
        
        $data = [
            "writer" => $writer,
            "tags" => $tags
        ];

        return view("dashboard.tag", $data);
    }

    public function updateAction(Request $request, $id)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $this->validate($request, [
            "name" => "required"
        ], $this->validationErrorMsg());

        $tag = Tag::find($id);

        $body = [
            "name" => $request->input("name")
        ];

        $tag->update($body);

        return redirect("dashboard/tag")->with("successMsg", "Tag diperbarui");
    }
}
