<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', "ContentController@index");
Route::get('/{name}', "ContentController@detail");
Route::get("/dashboard/content", "WriterController@index");
Route::get("/dashboard/login", "CredentialController@index");

Route::post("/dashboard/login", "CredentialController@login");
