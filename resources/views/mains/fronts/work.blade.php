@extends('layouts.fronts.frame')
@section('title')
<title>案例展示</title>
@endsection
@section('content')
<div class="m-header-banner m-list-header" style="background: url('{{asset($works['top_img'])}}') 50% 0 no-repeat fixed;">
    <section class="am-container">
<hgroup data-am-scrollspy="{animation:'slide-bottom', delay: 339}">
    <h2>{{$navs['work']}}</h2>
    <p>{{$works['top_txt']}}</p>
</hgroup>
    </section>
</div>
@include('layouts.fronts.centers.work')
@include('layouts.fronts.lows.work')
@endsection