<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Writer;
use File;

class WriterController extends Controller
{
    public function dashboardProfileView(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $writer = Writer::find($request->session()->get("id"));

        $data = [
            "writer" => $writer
        ];

        return view("dashboard.profile", $data);
    }

    public function updateFullNameAction(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $this->validate($request, [
            "full_name" => "required"
        ], $this->validationErrorMsg());

        $writer = Writer::find($request->session()->get("id"));

        $body = [
            "full_name" => $request->input("full_name")
        ];

        $writer->update($body);

        return redirect("/dashboard/profile")->with("successMsg", "Nama lengkap diperbarui.");
    }

    public function updateBioAction(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $this->validate($request, [
            "bio" => "required"
        ], $this->validationErrorMsg());

        $writer = Writer::find($request->session()->get("id"));

        $body = [
            "bio" => $request->input("bio")
        ];

        $writer->update($body);

        return redirect("/dashboard/profile")->with("successMsg", "Bio diperbarui.");
    }

    public function updateAvatarAction(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        $this->validate($request, [
            "avatar" => "required"
        ], $this->validationErrorMsg());

        $avatar = uniqid(). ".jpg";

        if($request->file("avatar")->getClientOriginalExtension() == "jpg" || $request->file("avatar")->getClientOriginalExtension() == "jpeg"){
            imagejpeg(imagecreatefromjpeg($request->file("avatar")),"avatar/".$avatar,50);
        }else{
            imagepng(imagecreatefrompng($request->file("avatar")),"avatar/".$avatar,5);
        }

        $writer = Writer::find($request->session()->get("id"));

        $avatarToUnlink = $writer->avatar;

        if($avatarToUnlink != "default_avatar.PNG" && File::exists(public_path("avatar/" . $avatarToUnlink))){
            unlink("avatar/" . $avatarToUnlink);
        }

        $body = [
            "avatar" => $avatar
        ];

        $writer->update($body);

        return redirect("/dashboard/profile")->with("successMsg", "Avatar diperbarui.");
    }
}
