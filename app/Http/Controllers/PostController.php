<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index(){
        $posts = Post::select('id','title','content')->get();
        return view('posts.index',compact('posts'));
    }

    public function store(Request $request){
        $post = $request->user()->posts()->create(
            $request->only(['title','content'])
        );

        return response()->json($post);
    }
}
