@extends('main')
@section('content')
<div class="row">
<div class="col-md-8">
<h3>All Tag</h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
		
		</tr>
	</thead>
	<tbody>
		@foreach($tags as $tag)
		<tr>
			<th>{{$tag->id}}</th>
			<td><a href="{{ route('tags.show',$tag->id)}}">{{$tag->name}}</a></td>
			
		</tr>
		@endforeach
	</tbody>
</table>


</div>
<div class="col-md-3">
	<div class="well">
		<h3>New Tag</h3>
		{!!Form::open(['route'=>'tags.store'])!!}
		{{Form::label('name','Name')}}
		{{Form::text('name',null,['class'=>'form-control','style'=>'margin-bottom:10px'])}}
		{{Form::submit('Add New Tag',['class'=>'btn btn-primary btn-block'])}}
	</div>
</div>	




</div>





@stop