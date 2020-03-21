<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Writer;
use File;

class ExternalController extends Controller
{
    public function ckEditorUploadImage(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }
        
        if($request->hasFile("upload")){
            $ckeditor = uniqid(). ".jpg";

            if($request->file("upload")->getClientOriginalExtension() == "jpg" || $request->file("upload")->getClientOriginalExtension() == "jpeg"){
                imagejpeg(imagecreatefromjpeg($request->file("upload")),"img/".$ckeditor,50);
            }else{
                imagepng(imagecreatefrompng($request->file("upload")),"img/".$ckeditor,5);
            }

            $rsp = [
                "uploaded" => true,
                "url" => url("/img") . "/" . $ckeditor
            ];

            return $rsp;
        }

        return "what ?";
    }

    public function dashboardImageView(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        if(!empty($request->query("delete")) && File::exists(public_path("img/".$request->query("delete")))){
            unlink("img/" . $request->query("delete"));
            redirect("/dashboard/image")->with("successMsg", "Gambar dihapus.");
        }

        $writer = Writer::find($request->session()->get("id"));

        $images = [];
        
        foreach(File::allfiles(public_path("img/")) as $file){
            array_push($images, [
                "name" => pathinfo($file)["basename"],
                "size" => formatSizeUnits(filesize($file))
            ]);
        }

        $data = [
            "writer" => $writer,
            "images" => $images
        ];

        return view("dashboard.image", $data);
    }
}
