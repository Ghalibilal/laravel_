@extends('main')
@section('content')
<div class="row">
	<div class='col-md-6'>
<h1>{{ $post->title}}</h1>
<img src="{{ asset('images/'.$post->image) }}" alt="" />
<p class="lead"> {!!$post->body!!}</p>
<hr>
<div class="tag">
	@foreach($post->tags as $tag)
	<span class="badge">{{$tag->name}}</span>
	@endforeach
	
</div>
<div class="col-md-6">
	<h2>Comments <small>{{$post->comment()->count()}}</small> Total</h2>
	<table class="table table-striped">
		<thead>
			<tr>
				<th>Name</th>
				<th>Email</th>
				<th>Comment</th>
				<th></th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			@foreach($post->comment as $comment)
			<tr>
				<td>{{$comment->name}}</td>
				<td>{{$comment->email}}</td>
				<td>{{$comment->comment}}</td>
				<td><a href="{{ route('comments.edit',$comment->id)}}" class="btn btn-default"><span class="glyphicon glyphicon-pencil"></span></a></td>
				<td><a href="{{ route('comments.delete',$comment->id)}}" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></a></td>
			</tr>
			@endforeach
		</tbody>
	</table>
</div>
</div>
<div class="col-md-6">

	<div class="well">
		<dl class='dl-horizontal'>
	 	<h5>URL</h5>
	 	<p><a href="{{url('blog/'.$post->slug)}}">{{url($post->slug)}}</a></p>
	 </dl>	
	 <dl class='dl-horizontal'>
	 	<h3>Category</h3>
	 	<p>{{$post->category->name}}</p>
	 </dl>	
	 <dl class='dl-horizontal'>
	 	<h3>Create At:</h3>
	 	<p>{{date('d M,Y h:i a',strtotime($post->created_at))}}</p>
	 </dl>	
	 <dl class='dl-horizontal'>
	 	<h3>Last Updated:</h3>
	 	<p>{{date('d M,Y h:i a',strtotime($post->updated_at))}}</p>
	 </dl>
	 <div class="row">
	 	<div class="col-xs-6">
	 		{{ Html::LinkRoute('posts.edit','Edit',array($post->id),array('class' =>'btn btn-primary btn-block' ))}}
	 		
	 	</div>
	 	<div class="col-xs-6">
	 		{!!Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE'])!!}
	 		
	 		{{Form::submit('DELLETE',['class'=>'btn btn-danger btn-block'])}}
	 		{!!Form::close()!!}
	 		
	 	</div>
	 </div><br>
	 <div class="row">
	 	<div class="col-xs-12">
	 		{{ Html::LinkRoute('posts.index','<< See All Post',array(),array('class' =>'btn btn-default btn-block' ))}}
	 	</div>
	 	
	 </div>

	</div>
	
</div>
</div>
@endsection