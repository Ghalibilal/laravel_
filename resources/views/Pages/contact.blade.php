@extends('main')
@section('header')
Contact Us
@endsection
@section('content')
        <div class="col-md-12">
            <form action="{{route('contact.post')}}" method="post">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" name="email" class="form-control" id="email">
      @csrf
    {{csrf_field()}}
  </div>
  <div class="form-group">
    <label for="pwd">Subject:</label>
    <input type="text" name="subject" class="form-control" id="pwd">
  </div>
  <div class="form-group">
    <label for="pwd">Message:</label>
    <textarea name='message' cols="10" rows="5" class="form-control
    ">
        
    </textarea>
  </div>
  
  
  <button type="submit" class="btn btn-success">Send Message</button>
</form>
            
        </div>
        

    @endsection