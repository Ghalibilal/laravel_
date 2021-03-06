@extends('main')
@section('content')
<div class="row">
<div class="col-md-8">
<h3>All Category</h3>
<table class="table table-striped">
	<thead>
		<tr>
			<th>#</th>
			<th>Name</th>
		</tr>
	</thead>
	<tbody>
		@foreach($categories as $category)
		<tr>
			<th>{{$category->id}}</th>
			<td>{{$category->name}}</td>
		</tr>
		@endforeach
	</tbody>
</table>


</div>
<div class="col-md-3">
	<div class="well">
		<h3>New Category</h3>
		{!!Form::open(['route'=>'categories.store'])!!}
		{{Form::label('name','Name')}}
		{{Form::text('name',null,['class'=>'form-control','style'=>'margin-bottom:10px'])}}
		{{Form::submit('Add New Category',['class'=>'btn btn-primary btn-block'])}}
	</div>
</div>	




</div>





@stop