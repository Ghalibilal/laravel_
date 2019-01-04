@extends('main')
@section('content')
<h1>Edit Comment</h1>
<div class="row">
	<div class="col-md-8 col-md-offset-2">
		{{Form::model($comments,['route'=>['comments.update',$comments->id],'method'=>'put'])}}
		{{Form::label('name','Name')}}
{{Form::text('name',null,['class'=>'form-control','disabled'=>''])}}
{{Form::label('email','Email')}}
{{Form::text('email',null,['class'=>'form-control','disabled'=>''])}}
{{Form::label('comment','Comment')}}
{{Form::textarea('comment',null,['class'=>'form-control','rows'=>'4'])}}
{{Form::label('')}}
{{Form::submit('Update Comment',['class'=>'btn btn-success btn-block'])}}


		{{Form::close()}}
		
	</div>
		
	
</div>




@stop