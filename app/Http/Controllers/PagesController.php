<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use App\Http\Requests\testRequest;
use Mail;



class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index(){
    $posts=Post::orderBy('id','desc')->LIMIT(5)->get();

    return view('Pages.welcome')->withPosts($posts);
   }
   public function about(){
    return view('Pages.about');
   }
   public function contact(){
    return view('Pages.contact');
   }
   public function postcontact(Request $request)
   {
            $this->validate($request,['email'=>'required|email',
              'subject'=>'required',
              'message'=>'required'

          ]);
            $data=array('email'=>$request->email,'subject'=>$request->subject,
               'message'=>$request->message);
        Mail::send('contacts.email',$data,function($message) use ($data){
               
               $message->from($data['email']);
               $message->to('hazratbilalghalib@gmail.com');
               $message->subject($data['subject']);
        });    
   }
}

