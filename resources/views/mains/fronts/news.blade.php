@extends('layouts.fronts.frame')
@section('title')
<title>最新动态</title>
@endsection
@section('content')
<div class="m-header-banner m-list-header" style="background: url('{{asset($news['top_img'])}}') 50% 0 no-repeat fixed;">
<section class="am-container">
<hgroup data-am-scrollspy="{animation:'slide-bottom', delay: 314}">
    <h2>{{$navs['news']}}</h2>
    <p>{{$news['top_txt']}}</p>
</hgroup>
</section>
</div>
@include('layouts.fronts.centers.news')
@include('layouts.fronts.lows.news')
@endsection
