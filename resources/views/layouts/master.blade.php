<!DOCTYPE html>
<html>
<head>
  <title>Homepage</title>
</head>
<body>
 @section('nav')
 @if (Auth::check())
 <a href="http://www.puanyang.com/auth/logout">logout</a> 
 @else 
 <a href="http://www.puanyang.com/auth/login">login</a>
 <a href='auth/register'>register</a>
 @endif 
 @show
<h1 display: inline><a href="http://www.puanyang.com/home">Personal Page</a></h1>
<h1 display: inline><a href="http://www.puanyang.com/">Public Page</a></h1>
 @yield('content')
