<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="/css/main.css">
 <!-- Styles -->
 <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <!-- CSRF Token -->
      <meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>

</head>

<!-- Header -->
<div class="header">
<h1>My Website</h1>
<p>With a <b>flexible</b> layout.</p>
</div>

<!-- Navigation Bar -->
<div class="navbar">
<a href="/index">HOME</a>
</div>

<body>
    @yield('content')
    <!-- Footer -->
<div class="footer">
    <h2>Footer</h2>
    </div>    
</body>