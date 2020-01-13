<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Post;
use App\PostComment;

class PostCommentController extends Controller
{

    public function __construct()
    {

        $this->middleware("auth");
        $this->middleware("rol.admin");

    }

    public function index()
    {
        
        $post_comments = PostComment::with("user")->get();

        return view("admin.post-comment.index", compact("post_comments"));

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(PostComment $post_comment)
    {
        
        return view("admin.post-comment.show", compact("post_comment"));

    }

    public function edit(PostComment $post_comment)
    {
        //
    }

    public function update(Request $request, PostComment $post_comment)
    {
        //
    }

    public function destroy(PostComment $post_comment)
    {
        
        $post_comment->delete();

        return redirect()->route("post-comment.index")->with("response", "comentario eliminado");

    }

    public function comments(Post $post)
    {

        $posts = Post::get();

        $post_comments = PostComment::get()->where("post_id", "=", $post->id);

        return view("admin.post-comment.post", compact("posts", "post", "post_comments"));

    }

    public function showComment(PostComment $post_comment)
    {

        return view("admin.post-comment.show", compact("post_comment"));

    }

    public function statusComment(PostComment $post_comment)
    {

        if($post_comment->approved == 1)
        {

            $post_comment->approved = "0";

        }
        else
        {

            $post_comment->approved = "1";

        }

        $approved = $post_comment->approved;

        $post_comment->update(compact("approved"));

        return response()->json($post_comment->approved);

    }

}