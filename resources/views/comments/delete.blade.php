@extends('main')
@section('content')
<div class="row">
<div class="col-md-6 col-md-offset-3">
<h1>Delete the comment</h1>
<p>Name: {{$comments->name}}</p>
<p>Email: {{$comments->email}}</p>
<p>comment: {{$comments->comment}}</p>
{!!Form::open(['route'=>['comments.destroy',$comments->id],'method'=>'delete'])!!}
{{Form::submit('Yes, Delete this comment',['class'=>'btn btn-danger btn-block'])}}
{!!Form::close()!!}
</div>
</div>
@stop