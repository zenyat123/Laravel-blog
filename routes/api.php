<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::resource("post", "Api\PostController")->only(["index", "show"]);

Route::get("post/{category}/category", "Api\PostController@category")->name("post.category");

Route::get("categories", "Api\CategoryController@index");

Route::post("sendcontact", "Api\ContactController@sendcontact");