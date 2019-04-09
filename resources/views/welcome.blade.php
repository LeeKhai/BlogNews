<!-- <!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div>
       <h1>ok</h1>
    </div>
</body>
</html> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
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
  @include('welcome.header')
  <div id="welcome">
     <router-view></router-view>
 </div>
  @include('welcome.footer')
</div> 
<script src="{{asset('welcome/js/jquery.min.js')}}"></script>
<script src="{{asset('welcome/js/owl.carousel.js')}}"></script>
<script src="{{asset('welcome/js/bootstrap.min.js')}}"></script>
<script src="{{asset('welcome/js/script.js')}}"></script> 
<script src="{{asset('welcome/js/offcanvas.min.js')}}"></script> 
<script src="{{asset('js/welcome.js')}}"></script>
</body>
</html>