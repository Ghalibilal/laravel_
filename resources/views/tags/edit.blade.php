@extends('main')
@section('content')
<div class='col-md-6 col-md-offset-3'>
{{Form::model($tags,['route'=>['tags.update',$tags->id] ,'method'=>'PUT'])}}
{{Form::label('title')}}
{{Form::text('name',null,['class'=>'form-control'])}}
{{Form::submit('Update Tag',['class'=>'btn btn-success btn-block'])}}


</div>

@stop