<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Homepage</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">    
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
<li><a href="login">Department Login</a></li>

</ul>

</div>
    <div class="welcome-text">
        <h1>
        Renew your<br> Ration <span>Card</span>
        </h1>
    <!-- <a href="#">Contact US</a> -->
     </div>

  
    <form action="/status" class = "cont" method = "post" enctype = "multipart/form-data" autocomplete="off"; >
    @csrf     
      <div class="container">
            <h1 class >CHECK APPLICATION STATUS</h1>
            <input type="text" placeholder="Enter your application number" name="app_no" required>
            <button type="submit" class = "check">CHECK</button>
            @if (session('success'))
                        <div class="alert-success" role="alert">
                            {{ session('success') }} 
                        </div>
            @endif

      </div>
    </form>

      
    <div class="footer">
    <h2>Copyright &copy 2021 | <span> Mercy Lalthangmawii<span></h2>
    </div>
        
</header>


</body>
</html>