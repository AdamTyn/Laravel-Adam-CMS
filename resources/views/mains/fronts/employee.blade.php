@extends('layouts.fronts.frame')
@section('title')
<title>海纳贤士</title>
@endsection
@section('content')
<div class="m-header-banner m-list-header" style="background: url('{{asset($employees['top_img'])}}') 50% 0 no-repeat fixed;">
    <section class="am-container"><hgroup data-am-scrollspy="{animation:'slide-bottom', delay: 107}">
    <h2>{{$navs['employee']}}</h2>
    <p>{{$employees['top_txt']}}</p>
</hgroup>    </section>
</div>
@include('layouts.fronts.centers.employee')
@include('layouts.fronts.lows.employee')
@endsection