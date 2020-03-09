<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Credential;

class CredentialController extends Controller
{
    public function index(Request $request)
    {
        if($request->session()->has("id")){
            return redirect("/dashboard/content");
        }
        
        return view("login");
    }

    public function loginAction(Request $request)
    {
        $body = [
            "email" => $request->input("email"),
            "password" => $request->input("password")
        ];

        $credential = Credential::where("email", $body["email"])->first();

        if(Hash::check($body["password"], $credential->password)){
            $request->session()->put("id", $credential->id);
            return redirect("/dashboard/content");
        }else{
            return redirect("/dashboard/login")->with("loginError", "Login gagal, email atau password salah");
        }
    }

    public function logoutAction(Request $request)
    {
        $request->session()->forget("id");
        return redirect("/dashboard/login")->with("logoutSuccess", "Anda telah logout");
    }
}
