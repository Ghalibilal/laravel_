<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>@yield('header')</title>

    <!-- Bootstrap -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  @yield('stylesheet');
  <style>
  body{
    background:#e0e0e0;
  
  }
  .navbar-default .navbar-nav>li>a {
    color: white;
}
.navbar-default .navbar-nav>li>a:hover {
    color: white;
    background: #990033;
}
 .navbar-default .navbar-nav>li>a:visited {
   background: #990033;
   color:white;
}
    
  </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

  </head>
  <body>
    <nav class="navbar navbar-default" style="background: #647888;">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/" style="background: green;color:yellow;">Laravel Blog</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav" style="background: black;">
        <li class="{{Request::is('/')?"active":""}}"><a href="/">Home <span class="sr-only">(current)</span></a></li>
        <li class="{{Request::is('blog')?"active":""}}"><a href="/blog">Blog</a></li>
         
                    
        <li class="{{Request::is('about')?"active":""}}"><a href="/about">About us</a></li>
        <li class="{{Request::is('contact')?"active":""}}"><a href="/contact">Contact</a></li>
        
          </ul>
        </li>
      </ul>
     
      <ul class="nav navbar-nav navbar-right" style="background:black;">
    
        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                {{-- <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li> --}}
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                       
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                  
                             <li class="{{Request::is('posts')?"active":""}}"><a  href="{{route('posts.index')}}">All Posts</a></li>
                              <li class="{{Request::is('categories')?"active":""}}"><a href="{{route('categories.index')}}">All Categories</a></li>
                                    <li class="{{Request::is('tags')?"active":""}}"><a href="{{route('tags.index')}}">All Tags</a></li>
                                  
                                </div>
                                   
                        @endguest
                         </li>
          </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
    <!--end of navbar -->
    <div class="container">
      @if(Session::has('success'))
      <div class="alert alert-success alert-dismissible">
  <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
  <strong>Success!</strong><h2>{{Session::get('success')}}</h2>
</div>


        
      @endif
      
      @yield('content')
      
        
      </div>
      <hr>
      <div class='container'>
        <div class="row">
          <div class="col-xs-12 text-center">
            <p>All copyright is reserved by Ghalib</p>
            
          </div>
          
        </div>


      </div>
    
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    @yield('javascript');
  </body>
</html>