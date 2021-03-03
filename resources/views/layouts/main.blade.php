<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- <link rel="stylesheet" href="/css/app.css">     -->


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
<li><a href="#">Contact</a></li>
<li><a href="login">Department Login</a></li>

</ul>
</div>

@yield('content')

<div class="footer">
    <h2>Copyright &copy 2021 | <span> Mercy Lalthangmawii<span></h2>
    </div>
        
</header>

</body>
</html>
