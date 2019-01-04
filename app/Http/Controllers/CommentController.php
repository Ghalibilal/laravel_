<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;
use App\Post;
use Session;

class CommentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$id)
    {
       $this->validate($request,['name'=>'required','email'=>'required|email','comment'=>'required|min:5']);
       $post=Post::find($id);
       $comment=New Comment;
       $comment->name=$request->name;
       $comment->email=$request->email;
       $comment->comment=$request->comment;
       
       $comment->post()->associate($post);
       $comment->save();
       Session::flash('success','Comment has added');
       return redirect()->route('blog.slug',$post->slug);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comments=Comment::find($id);
        return view('comments.edit')->withComments($comments);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $comment=Comment::find($id);
        $this->validate($request,['comment'=>'required']);
        $comment->comment=$request->comment;
        $comment->save();
        Session::flash('success','Comment successfully updated');
        return redirect()->route('posts.show',$comment->post->id);
    }
    public function delete($id)
    {
        $comments=Comment::find($id);
        return view('comments.delete')->withComments($comments);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comments=Comment::find($id);
        $post_id=$comments->post->id;
        $comments->delete();
        Session::flash('success','Comments successfully deleted');
        return redirect()->route('posts.show',$post_id);
    }
}
