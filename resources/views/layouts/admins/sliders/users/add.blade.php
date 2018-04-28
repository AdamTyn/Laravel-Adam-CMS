@extends('layouts.admins.sliders.users.frame')
@section('sec')
<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i></a>
    </a>
<ul class="tpl-left-nav-sub-menu" style="display:block">
	<li>
	<a href="{{url('admin/user-setting/list')}}">
	<i class="am-icon-angle-right"></i>
	<span>用户列表</span>
	</a>
	<a class="active" href="{{url('admin/user-setting/add')}}">
	<i class="am-icon-angle-right"></i>
	<span>添加用户</span>
	</a>
	</li>
</ul>
@endsection