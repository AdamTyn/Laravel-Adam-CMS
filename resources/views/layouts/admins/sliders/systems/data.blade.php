@extends('layouts.admins.sliders.systems.frame')
@section('sec')
<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i></a>
    </a>
<ul class="tpl-left-nav-sub-menu" style="display:block">
    <li>
        <a class="active" href="{{url('admin/system/data')}}">
        <i class="am-icon-angle-right"></i>
        <span>数据统计</span>
        </a>
        <a href="{{url('admin/system/log')}}">
        <i class="am-icon-angle-right"></i>
        <span>系统日志</span>
        </a>
    </li>
</ul>
@endsection