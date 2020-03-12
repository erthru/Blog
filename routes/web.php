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

// view
Route::get('/', "ContentController@homeView");
Route::get('/{url}', "ContentController@detailView");
Route::get("/dashboard/login", "CredentialController@loginView");
Route::get("/dashboard/content", "ContentController@dashboardContentView");
Route::get("/dashboard/content/add", "ContentController@dashboardContentAddView");
Route::get("/dashboard/content/update/{id}", "ContentController@dashboardContentUpdateView");
Route::get("/dashboard/quote", "QuoteController@dashboardQuoteView");
Route::get("/dashboard/quote/add", "QuoteController@dashboardQuoteAddView");
Route::get("/dashboard/quote/update/{id}", "QuoteController@dashboardQuoteUpdateView");
Route::get("/dashboard/quote/delete/{id}", "QuoteController@deleteAction");
Route::get("/dashboard/tag", "TagController@DashboardTagView");

// action
Route::get("/dashboard/logout", "CredentialController@logoutAction");
Route::get("/dashboard/content/delete/{id}", "ContentController@deleteAction");
Route::post("/dashboard/login", "CredentialController@loginAction");
Route::post("/dashboard/content/add", "ContentController@addAction");
Route::post("/dashboard/content/update/{id}", "ContentController@updateAction");
Route::post("/dashboard/quote/add", "QuoteController@addAction");
Route::post("/dashboard/quote/update/{id}", "QuoteController@updateAction");
Route::post("/dashboard/tag/update/{id}", "TagController@updateAction");