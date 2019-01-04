@extends('main')
@section('stylesheet')
{!!Html::style('css/select2.min.css')!!}
@endsection
<script src="https://cloud.tinymce.com/stable/tinymce.min.js"></script>
  <script>tinymce.init({ selector:'textarea',
   menubar:false
   });</script>
@section('content')
<div class="row">
	

	{!!Form::model($post,['route'=>['posts.update',$post->id],'method'=>'put','files'=>true])!!}
	<div class='col-md-8 col-md-offset-2'>
		<table class="table">
			
	{{Form::label('title','Title:')}}


	{{Form::text('title',null,['class'=>'form-control input-lg'])}}
	{{$errors->first('title')}}

	{{Form::label('slug','Slug')}}
{{Form::text('slug',null, array('class' =>'form-control'  ))}}
{{Form::label('category_id','Category')}}
{{Form::select('category_id',$categories,$post->category_id,['class'=>'form-control'])}}
{{Form::label('tag','Tag')}}
{{Form::select('tag[]',$tag,null,['class'=>'form-control select2','multiple'=>'multiple'])}}
{{Form::label('feature_image','Upload new Picture:')}}


	{{Form::file('feature_image',['class'=>'form-control'])}}
	
        
	{{Form::label('body','Post Body:',['style'=>'margin-top:30px;'])}}
	{{Form::textarea('body',null,['class'=>'form-control input-lg'])}}
	{{$errors->first('body')}}

</div>
</table> 
</div>
<div class="row">
<div class="col-md-8 col-md-offset-2">

	<div class="well">
	 <dl class='dl-horizontal'>
	 	<dt>Create At:</dt>
	 	<dd>{{date('d M,Y h:i a',strtotime($post->created_at))}}</dd>
	 </dl>	
	 <dl class='dl-horizontal'>
	 	<dt>Last Updated:</dt>
	 	<dd>{{date('d M,Y h:i a',strtotime($post->updated_at))}}</dd>
	 </dl>
	 <div class="row">
	 	<div class="col-xs-6">
	 		{{ Html::LinkRoute('posts.show','Cancel',array($post->id),array('class' =>'btn btn-danger btn-block' ))}}
	 		
	 	</div>
	 	<div class="col-xs-6">
	 		{{Form::submit('Save Change',['class'=>'btn btn-success btn-block'])}}
	 		
	 		
	 	</div>
	 </div>

	</div>
	
</div>
{!!Form::close()!!}
</div>
@endsection
@section('javascript')
{!!Html::script('js/select2.min.js')!!}
<script type="text/javascript">
	$(function(){
	$(".select2").select2();
	$(".select2").select2().val({!! json_encode($post->tags()->allRelatedIds()) !!}).trigger('change');
});
</script>
@endsection