<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WriterController extends Controller
{
    public function index(Request $request)
    {
        if(!$request->session()->has("id")){
            return redirect("/dashboard/login");
        }

        return view("dashboard.main");
    }
}
