@extends('main')
@section('header')
Laravel blog
@endsection
@section('content')
<div class="jumbotron">
  <h1>Welcome to My Blog!</h1>
  <p>Thank you for visiting my blog See  my popular blog</p>
  <p><a class="btn btn-success btn-lg" href="#" role="button">Popular Blog</a></p>
</div>
      <div class="row">
        <div class="col-md-8 col-md-offset-2 ">
       
          @foreach($posts as $post)
          <h2 class=
          "text-center">{{$post->title}}</h2>
          <img src="{{ asset('images/'.$post->image) }}"  style="width:100%;max-height:400px;height:auto;"alt="image which is hide">
         <div class="well" <p>{{substr(strip_tags($post->body), 0,300)}}{{strlen($post->body)>300?"...":""}} </p></div>
          <p><a href="{{ url('blog/'.$post->slug) }}" class='btn btn-primary'>Read More</a></p>
          <hr>
          @endforeach
     
            
        </div>
        {{-- <div class="col-xs-3 col-xs-offset-1">
          <h2>Side Bar</h2>
          
        </div> --}}
          
        
      </div>

   @endsection