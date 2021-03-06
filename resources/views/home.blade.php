<!DOCTYPE html>
<html lang="en">
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta name="csrf-token" content="{{ csrf_token() }}">


<head>
    <meta charset="UTF-8">
    <title>Department Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css"> 
    <link rel="stylesheet" href="/css/app.css">    
    <script src="{{ asset('js/app.js') }}" defer></script>


</head>
<body>
    <header>
        
    <div class="wrapper">
        <div class="logo">
            <img src="india.png"  width="60px" height="80px" alt="gov" id = "india">
            
        </div>
        <P class = "gov-text">Government of Mizoram <br> Food Civil Supplies and Consumer Affairs</p>
 
<ul class="nav-area">
<li><a href="/">Home</a></li>
<li><a href="/info">Info</a></li>
<li><a href="/contact">Contact</a></li>

    <!-- Authentication Links -->
    @guest
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
        @if (Route::has('register'))
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
            </li>
        @endif
    @else
        <li class="nav-item dropdown">
            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </div>
        </li>
    @endguest
</ul>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif


                    You are logged in!
                    @if ( auth()->user()->role == 'csc')
                        <p><a href = "/form">CONTINUE TO FORM</a></p>

                        @if (Session::has('success'))
                        <p class ="alert alert-success">{{session('success')}}</p>
                        <p><a href = "/pdf/{{session('user')}}">Click here to download acknowledgement receipt</a></p>
                        
                        @endif

                    @elseif ( auth()->user()->role == 'dcso')
                    <script> window.location = "/applicants"; </script>

                    @elseif ( auth()->user()->role == 'clerk')
                    <script> window.location = "/applicants_clerk"; </script>

                    @elseif ( auth()->user()->role == 'admin')
                    <script> window.location = "/admin"; </script>
                    
                    @endif
                    

                         
                    
                </div>
            </div>
        </div>
    </div>
</div>
        
</header>

<div class="footer">
<h2>Copyright &copy 2021 | <span> Mercy Lalthangmawii<span></h2>
</div>


</body>
</html>