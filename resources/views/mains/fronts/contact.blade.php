@extends('layouts.fronts.frame')
@section('title')
<title>联系我们</title>
@endsection
@section('content')
<div class="m-header-banner m-list-header" style="background: url('{{asset($contacts['top_img'])}}') 50% 0 no-repeat fixed;">
  <section class="am-container"><hgroup data-am-scrollspy="{animation:'slide-bottom', delay: 267}">
    <h2>{{$navs['contact']}}</h2>
    <p>{{$contacts['top_txt']}}</p>
 </hgroup>  </section>
</div>
@include('layouts.fronts.centers.contact')
@include('layouts.fronts.lows.contact')
@endsection