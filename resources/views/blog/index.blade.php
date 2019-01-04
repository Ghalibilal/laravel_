@extends('main')

@section('content')

<div class="row">
	<div class="col-md-8 col-md-offset-2">
		<h1>Blog</h1>
	</div>	
</div>
<div class="row">
	@foreach($posts as $post)
	<div class="col-md-8 col-md-offset-2">
		<h3>{{$post->title}}</h3>
		<h4>Published:{{date('j M,Y',strtotime($post->created_at))}}</h4>
		<p>{{substr(strip_tags($post->body), 0,200)}}{{strlen($post->body)>200?"...":""}}</p>
		<a href="{{ route('blog.slug',$post->slug) }}" class="btn btn-primary">Read More</a>
		<hr>
	</div>	

	@endforeach
	
</div>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		{{$posts->links()}}
	</div>	
</div>




@stop