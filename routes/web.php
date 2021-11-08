<?php

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

Auth::routes();

Route::get("/", "Web\WebController@index")->name("web");

Route::get("/admin", "HomeController@admin")->name("admin");

Route::get("/home", "HomeController@index")->name("home");

Route::resource("/admin/user", "Admin\UserController");

Route::resource("/admin/category", "Admin\CategoryController");

Route::resource("/admin/post", "Admin\PostController");

Route::post("/admin/post/images", "Admin\PostController@images");

Route::resource("/admin/post-comment", "Admin\PostCommentController");

Route::get("/admin/post-comment/{post}/post", "Admin\PostCommentController@comments")->name("post-comments");

Route::get("/admin/post-comment/show/{post_comment}", "Admin\PostCommentController@showComment");

Route::post("/admin/post-comment/status/{post_comment}", "Admin\PostCommentController@statusComment");

Route::resource("/admin/contact", "Admin\ContactController");

Route::get("/categories", "Web\WebController@categories");

Route::get("/category/{id}", "Web\WebController@category");

Route::get("/post/{id}", "Web\WebController@post");

Route::get("/contact", "Web\WebController@contact")->name("contact");