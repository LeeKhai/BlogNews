<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sports</title>
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,700|Roboto:400,500" rel="stylesheet"> 
    <link href="{{asset('welcome/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('welcome/fonts/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('welcome/css/owl.carousel.css')}}" rel="stylesheet">
	  <link href="{{asset('welcome/css/owl.theme.default.min.css')}}" rel="stylesheet">
    <link href="{{asset('welcome/css/offcanvas.min.css')}}" rel="stylesheet">
    <link href="{{asset('welcome/css/style.css')}}" rel="stylesheet">
    
	<meta name="csrf-token" content="{{ csrf_token() }}">
  </head>
<body>
<div id="main-wrapper">
  @include('welcome.layout.header')
  @yield('content')
  @include('welcome.layout.footer')
</div> 
<script src="{{asset('welcome/js/jquery.min.js')}}"></script>
<script src="{{asset('welcome/js/owl.carousel.js')}}"></script>
<script src="{{asset('welcome/js/bootstrap.min.js')}}"></script>
<script src="{{asset('welcome/js/script.js')}}"></script> 
<!-- <script src="{{asset('welcome/js/offcanvas.min.js')}}"></script>  -->

</body>
</html>