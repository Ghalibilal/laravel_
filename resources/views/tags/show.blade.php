@extends('main')
@section('content')
<div class="row">
	<div class="col-md-6">
<h1>{{$tags->name}}: Posts<span class="badge">{{$tags->posts()->count()}}</span></h1>
</div>
<div class="col-md-2">
	<a class="btn btn-primary btn-block pull-right" href="{{ route('tags.edit',$tags->id) }}">Edit</a>
</div>
<div class="col-md-2">
	{!!Form::open(['route'=>['tags.destroy',$tags->id],'method'=>'DELETE'])!!}
	{{Form::submit('DELETE',['class'=>'btn btn-danger btn-block'])}}
	{!!Form::close()!!}

</div>
</div>
<hr>
<div class="row">

	<table class="table table-striped">
		<thead>
			<tr>
				<th>#</th>
				<th>title</th>
				<th>tags</th>
				<th></th>
			</tr>
		</thead>
		<tbody>

          @foreach($tags->posts as $post)
			<tr>
				<td>{{$post->id}}
				</td>
				<td>{{$post->title}}
				</td>
				<td>@foreach($post->tags as $tag)
					<span class="badge">{{$tag->name}}</span>
					@endforeach
				</td>
				<td><a  class="btn btn-default btn-sm" href="{{ route('posts.show',$post->id) }}">View</a></td>
			</tr>
			@endforeach

		</tbody>
	</table>
</div>


@stop