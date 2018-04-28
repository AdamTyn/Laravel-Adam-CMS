@extends('layouts.fronts.frame')
@section('title')
<title>服务内容</title>
@endsection
@section('content')
<div class="m-header-banner m-list-header" style="background: url('{{asset($services['top_img'])}}') 50% 0 no-repeat fixed;">
    <section class="am-container">
<hgroup data-am-scrollspy="{animation:'slide-bottom', delay: 317}">
    <h2>{{$navs['service']}}</h2>
    <p>{{$services['top_txt']}}</p>
</hgroup>
    </section>
</div>
@include('layouts.fronts.centers.service')
@include('layouts.fronts.lows.service')
@endsection