<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
@yield('title')
	<meta name="description" content="武汉鼎力合众文化传播有限公司">
	<meta name="keywords" content="武汉鼎力合众文化传播有限公司">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/x-icon" href="{{asset('images/logo.ico')}}">
    <link rel="stylesheet" href="{{asset('css/amazeui.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/jquery.min.js')}}"></script>
</head>
<body>
@include('layouts.fronts.header')
@yield('content')
@include('layouts.fronts.footer')
@include('layouts.fronts.script')
</body>
</html>