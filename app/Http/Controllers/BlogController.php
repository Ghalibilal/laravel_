<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class BlogController extends Controller
{
    public function singleblog($slug)
    {
           $posts=Post::where('slug','=',$slug)->first();
           
    	return view('blog.singleblog')->withPosts($posts);
    }
    public function index()
    {
    	$posts=Post::orderBy('id','desc')->paginate(5);
    	return view('blog.index')->withPosts($posts);
    }
}
