<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\testRequest;
use App\Post;
use Session;
use App\Category;
use App\Tag;
use Image;
use Storage;
class PostController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(5);

        return view('posts.index')->withPosts($posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $categories=Category::all();
        $tags=Tag::all();
        return view('posts.create')->withCategories($categories)->withTags($tags);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
        
         $post=new Post;
         $post->title=$request->title;
         $post->slug=$request->slug;
         $post->body=$request->body;
         $post->category_id=$request->category_id;
         if($request->hasFile('feature_image'))
         {
            $image=$request->file('feature_image');
            $filename=time().".".$image->getClientOriginalExtension();
            // Check if Category Dir exists;
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400,200)->save($location);
           $post->image=$filename;
         }
         $post->save();
         $post->tags()->sync($request->tags,false);
         Session::flash('success','The Post has been published');
         return redirect()->route('posts.show',$post->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post=Post::find($id);
       return view('posts.show')->withPost($post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $categories=Category::all();
        $tags=Tag::all();
        $cats=array();
        foreach($categories as $category){
            $cats[$category->id]=$category->name;
        }
        $caats=array();
        foreach($tags as $tag){
            $caats[$tag->id]=$tag->name;
        }

        return view('posts.edit')->withPost($post)->withCategories($cats)->withTag($caats);
    }

    /**
     * Update the specified resource in storage.
     *4
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post=Post::find($id);
        if($post->slug==$request->input('slug'))
        {
            $this->validate($request, array('title' =>'required|max:255' ,'body'=>'required','category_id'=>'required|max:255' ));
        }
        else
        {
            $this->validate($request,array('title'=>'required|max:255',
            'slug'=>'required|min:5|max:255|unique:posts,slug',
            'body'=>'required','category_id'=>'required|max:255' ));
        }
        $post->title=$request->input('title');
        $post->slug=$request->input('slug');
        $post->body=$request->input('body');
        $post->category_id=$request->input('category_id');
        if($request->hasFile('feature_image'))
        {
            $image=$request->file('feature_image');
            $filename=time().".".$image->getClientOriginalExtension();
            // Check if Category Dir exists;
            $location=public_path('images/'.$filename);
            Image::make($image)->resize(400,200)->save($location);

            $oldfilename=$post->image;
            $post->image=$filename;
            Storage::delete($oldfilename);

           
         }
                $post->save();
                if(isset($request->tag))
                {
                    $post->tags()->sync($request->tag);
                }
        Session::flash('success','The Post has been Updated');
        return redirect()->route('posts.show',$post->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        $post->tags()->detach();
        Storage::delete($post->image);
        $post->delete();
        Session::flash('success','Post was successfully Deleted');
        return redirect()->route('posts.index');
    }
}
