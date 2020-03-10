<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ExternalController extends Controller
{
    public function ckEditorUploadImage(Request $request)
    {
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
}
