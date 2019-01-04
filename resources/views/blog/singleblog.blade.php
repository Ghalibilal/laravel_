@extends('main')
@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>{{$posts->title}}</h1>
		<img src="{{ asset('images/'.$posts->image) }}" alt="image which is hide">
		<p>{!!$posts->body!!}</p>
		<hr>
		<p>Category:{{$posts->category->name}}</p>
		
	</div>

</div>	
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h2><i class="glyphicon glyphicon-comment"></i> {{$posts->comment()->count()}} Comments</h2>
		@foreach($posts->comment as $comments)
	      
	       <div class="media">
    <div class="media-left">
      <img src={{"https://www.gravatar.com/avatar/".md5( strtolower( trim( $comments->email ) ) )}} class="media-object" style="width:45px;border-radius: 50%;">
    </div>
    <div class="media-body">
      <h4 class="media-heading">{{$comments->name}}<br> <small><i>Posted on {{date('d M,Y',strtotime($comments->created_at))}}</i></small></h4>
      <p style="width:40%;">{{$comments->comment}}</p></div>
		@endforeach 
	</div>

	
</div>
<div class="row">
<div id="comment" class="col-md-8 col-md-offset-2">
	<h1>comments</h1>
	<div class="row">
		{!!Form::open( ['route'=>['comments.store',$posts->id] ,'method'=>'POST'])!!}
		<div class="col-md-6">
			{{Form::label('name','Name')}}
{{Form::text('name',null, array('class' =>'form-control'  ))}}
			
		</div>
		<div class="col-md-6">
			{{Form::label('email','Email')}}
{{Form::text('email',null, array('class' =>'form-control'  ))}}
			
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
			{{Form::label('comment','Comment')}}
{{Form::textarea('comment',null, array('class' =>'form-control','rows'=>'4'  ))}}
		</div>
		
	</div>
	<div class="row">
		<div class="col-md-12">
		
{{Form::submit('Comment',['class'=>'btn btn-success btn-block'])}}
		</div>
		
	</div>
</div>
{!!Form::close()!!}

</div>


@stop