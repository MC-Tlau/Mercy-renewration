<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Contact</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">    
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/app.css">    


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
<div class = "form-container">
<form class="form-horizontal" method="POST" action="/contact">
  
   {{ csrf_field() }}
      
  <div class="form-group">
   <label for="Name">NAME</label>
   <input type="text" class="form-control" id="name" placeholder="Name" name="name" required>
  </div>
  <div class="form-group">
   <label for="email">EMAIL</label>
   <input type="text" class="form-control" id="email" placeholder="Email" name="email" required>
  </div>
  <div class="form-group">
   <label for="message">MESSAGE</label>
   <textarea type="text" class="" id="message"  placeholder="Enter your message here" name="message" required> </textarea>
  </div>
  <div class="form-group">
      <div class = "center-button">
        <button type="submit" class="btn btn-primary"  value="Send">Send</button>
    </div>
  </div>
    
</form>

<div class="footer">
    <h2>Copyright &copy 2021 | <span> Mercy Lalthangmawii<span></h2>
    </div>

</div>
</header>


</body>
</html>