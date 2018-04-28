@extends('layouts.fronts.frame')
@section('title')
<title>关于鼎力</title>
@endsection
@section('content')
<div class="m-header-banner m-list-header" style="background: url('{{asset($about['top_img'])}}') 50% 0 no-repeat fixed;">
    <section class="am-container"><hgroup data-am-scrollspy="{animation:'slide-bottom', delay: 107}">
    <h2>{{$navs['about']}}</h2>
    <p>{{$about['top_txt']}}</p>
</hgroup>    </section>
</div>
@include('layouts.fronts.centers.about')
@include('layouts.fronts.lows.about')
@endsection