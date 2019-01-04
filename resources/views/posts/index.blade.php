
@extends('main')
@section('content')

<div class="row">
	<div class="col-md-10">
		<h2>All Posts</h2>
		
	</div>
	<div class="col-md-2">
		<a href="{{ route('posts.create') }}" class="btn btn-primary btn-lg">Create Post</a>
		
	</div>
	<div class="col-xs-12">
	<hr>
	</div>
	
</div>
<div class="row">
 <div class="col-md-12">
 	<table class="table table-striped">
 	
 		<thead>
 			<tr>
 				<th>#</th>
 				<th>Title</th>
 				<th>Body</th>
 				<th>Created</th>
 				<th></th>
 			
 			</tr>
 		</thead>
 		<tbody>
 			@foreach($posts as $post)
 			<tr>
 				<td>{{$post->id}}</td>
 				<td>{{$post->title}}</td>
 				<td>{{substr(strip_tags($post->body),0,35)}}{{strlen(strip_tags($post->body))>35?"....":""}}</td>
 				<td>{{date('j M,Y',strtotime($post->created_at))}}</td>
 				<td><a href="{{ route('posts.show',$post->id) }}" class="btn btn-default">View</a>&nbsp;<a href="{{ route('posts.edit',$post->id) }}" class="btn btn-default">Edit</a></td>

 			</tr>
 			@endforeach
 		</tbody>
 	</table>
 	{{$posts->links()}}
 </div>
</div>	



@endsection
