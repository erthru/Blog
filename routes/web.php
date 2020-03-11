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

Route::get('/', "ContentController@homeView");
Route::get('/{url}', "ContentController@detailView");
Route::get("/dashboard/content", "ContentController@dashboardContentView");
Route::get("/dashboard/content/add", "ContentController@dashboardContentAddView");
Route::get("/dashboard/login", "CredentialController@loginView");
Route::get("/dashboard/logout", "CredentialController@logoutAction");

Route::post("/dashboard/login", "CredentialController@loginAction");
Route::post("/dashboard/content/add", "ContentController@addAction");
