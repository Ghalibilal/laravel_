@extends('main')
@section('stylesheet')
{!!Html::style('css/select2.min.css')!!}
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea',
   menubar:false
   });</script>
@endsection
@section('content')
<div class="row">
	<div class="col-xs-8 col-xs-offset-2">
{!! Form::open(array('route' =>'posts.store','files'=>true )) !!}
{{Form::label('title','Title')}}
{{Form::text('title',null, array('class' =>'form-control'  ))}}
{{$errors->first('title')}}
{{Form::label('slug','Slug')}}
{{Form::text('slug',null, array('class' =>'form-control'  ))}}
{{$errors->first('slug')}}

{{Form::label('category_id','Category')}}
<select name="category_id" class="form-control">
	@foreach($categories as $category)
	<option value="{{$category->id}}">{{$category->name}}</option>
	@endforeach
</select>
{{Form::label('tags','Tags')}}
<select name="tags[]" class="form-control select2" multiple="multiple">
	@foreach($tags as $tag)
	<option value="{{$tag->id}}">{{$tag->name}}</option>
	@endforeach
</select>
{{Form::label('feature_image','Upload a Image')}}
{{Form::file('feature_image',null, array('class' =>'form-control'  ))}}
{{Form::label('body','Post Body')}}
{{Form::textarea('body',null, array('class' =>'form-control'  ))}}
{{Form::submit('Create a Post', array('class' =>'btn btn-lg btn-success btn-block','style'=>'margin-top:20px'  ))}}
{{$errors->first('body')}}





{!! Form::close() !!}

1</div>
</div>
@endsection
@section('javascript')
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript">
	$(function(){
	$(".select2").select2();
});
</script>
@endsection