<header class="am-topbar am-topbar-inverse admin-header">
<div class="am-topbar-brand">
    <a href="{{asset('admin')}}" class="tpl-logo">
    <img src="{{asset('images/logo.jpg')}}" alt="">
    </a>
</div>
<div class="am-icon-list tpl-header-nav-hover-ico am-fl am-margin-right">
</div>
<div class="am-collapse am-topbar-collapse" id="topbar-collapse">
    <ul class="am-nav am-nav-pills am-topbar-nav am-topbar-right admin-header-list tpl-header-list">
        <li class="am-hide-sm-only"><a href="javascript:;" id="admin-fullscreen" class="tpl-header-list-link"><span class="am-icon-arrows-alt"></span><span class="admin-fullText">开启全屏</span></a></li>
        <li class="am-dropdown" data-am-dropdown data-am-dropdown-toggle>
        <a class="am-dropdown-toggle tpl-header-list-link" href="">
            @php
                $info = json_decode(session('user'),true);
            @endphp
        <span class="tpl-header-list-user-nick">{{$info['name']}}&nbsp;&nbsp;</span><span class="tpl-header-list-user-ico"><img src="{{asset('images/user.jpg')}}"></span>
        </a>
        <ul class="am-dropdown-content">
            @if ($info['role'] != 1)
                <li><a href="javascript:void(0);"><span class="am-icon-user"></span>&nbsp;&nbsp;子管理员</a></li>
                @else
                <li><a href="javascript:void(0);"><span class="am-icon-user"></span>&nbsp;&nbsp;Super管理员</a></li>
            @endif
            <li><a href="{{url('admin/logout')}}"><span class="am-icon-power-off"></span>&nbsp;&nbsp;退出</a></li>
        </ul>
        </li>
        <li><a href="{{url('admin/logout')}}" class="tpl-header-list-link"><span class="am-icon-sign-out tpl-header-list-ico-out-size"></span></a></li>
    </ul>
</div>
</header>
