<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>鼎力后台</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.ico')}}" media="screen"/>
<script src="{{asset('js/jquery.min.js')}}"></script>
<link rel="stylesheet" href="{{asset('css/amazeui.min.css')}}"/>
<link rel="stylesheet" href="{{asset('css/admin.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body data-type="index">
@include('layouts.admins.header')
<div class="tpl-page-container tpl-page-header-fixed">
@include('layouts.admins.slider')
@yield('content')
</div>
@yield('script')
</body>
</html>