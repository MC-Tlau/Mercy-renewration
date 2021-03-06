<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title> Status</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/css/style.css">    
    <script src="{{ asset('js/app.js') }}" defer></script>
<style>

table
{
    table-layout: auto;
    width: 100%;
    color:white;
    text-align:center;
    border-style:groove;

}
.head
{
    color:white;
    font-size:30px;
    letter-spacing:3px;
    text-align:center;
}
</style>
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
        </table>

        <h2 class = "head">Application Number {{$user->application_no}}</h2>
        <table id = "family" width="100%">
            <tr>
                <th>Head of Family</th>
                <th>Application Status</th>
                <th>Ration Card</th>
                
            </tr>
            <hr>
            <br>
            <tr>
                <td>{{$user->family_head}}</td>
                <td>{{$user->status}}</td>
                <td><a href = '/ration/{{$user->id}}'>Download </a></td>

            </tr>	
            
        </table>
        
     </div>

    <div class="footer">
    <h2>Copyright &copy 2021 | <span> Mercy Lalthangmawii<span></h2>
    </div>
        
</header>


</body>
</html>