<header class="m-hd">
    <section data-am-sticky class="am-show-md-up">
    <div class="am-container">
        <a href="{{url('/')}}" rel="nofollow" class="m-logo"><i class="am-icon-spinner"></i>鼎力合众</a>
        <nav>
          <ul class="m-nav am-nav am-nav-pills am-fr">
@foreach ($navs as $key=>$value)
            <li><a href="{{url($key)}}" rel="nofollow">{{$value}}</a></li>
@endforeach
          </ul>
        </nav>
    </section>
    </div>
    <nav data-am-widget="header" class="am-header am-show-sm-only">
      <div class="am-header-left am-header-nav">
        <a href="{{url('/')}}" rel="nofollow">
          <i class="am-header-icon am-icon-home"></i>&nbsp;首页
        </a>
      </div>
      <h1 class="am-header-title">
        <a href="{{url('/')}}" rel="nofollow">鼎力合众</a>
      </h1>
      <div class="am-header-right am-header-nav">
        <a href="#right-link" class="" data-am-offcanvas="{target: '#r-nav'}">
          <i class="am-header-icon am-icon-bars"></i>&nbsp;菜单
        </a>
      </div>
    </nav>
    <!-- MiniMenu -->
    <div id="r-nav" class="am-offcanvas">
      <div class="am-offcanvas-bar am-offcanvas-bar-flip">
        <nav class="am-offcanvas-content">
            <a href="#" rel="nofollow"><span class="logo"></span></a>
@foreach ($navs as $key=>$value)
@switch($key)
    @case('/')
        <p><i class="am-icon-home"></i><a href="{{url($key)}}" rel="nofollow">&nbsp;{{$value}}</a></p>
        @break
    @case('service')
        <p><i class="am-icon-suitcase"></i><a href="{{url($key)}}" rel="nofollow">&nbsp;{{$value}}</a></p>
        @break
    @case('contact')
        <p><i class="am-icon-bullhorn"></i><a href="{{url($key)}}" rel="nofollow">&nbsp;{{$value}}</a></p>
        @break
    @case('work')
        <p><i class="am-icon-credit-card"></i><a href="{{url($key)}}" rel="nofollow">&nbsp;{{$value}}</a></p>
        @break
    @case('employee')
        <p><i class="am-icon-group"></i><a href="{{url($key)}}" rel="nofollow">&nbsp;{{$value}}</a></p>
        @break
    @case('about')
        <p><i class="am-icon-envelope"></i><a href="{{url($key)}}" rel="nofollow">&nbsp;{{$value}}</a></p>
        @break
    @default
        <p><i class="am-icon-map"></i><a href="{{url($key)}}" rel="nofollow">&nbsp;{{$value}}</a></p>
        @break
@endswitch
@endforeach
        </nav>
      </div>
    </div>
</header>