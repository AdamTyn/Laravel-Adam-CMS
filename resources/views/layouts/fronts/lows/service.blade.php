<section class="am-container m-service-page">
<div class="m-service-container">
  <h2>服务体系</h2>
  <ul class="am-avg-sm-1 am-avg-md-1 am-avg-lg-1 am-thumbnails m-service-list">
@foreach ($services['contents'] as $value)
<li>
<div class="am-u-lg-2 am-u-md-12 m-service-list-icon am-hide-md-down">
  <i class="am-icon-{{$value['picture']}}"></i>
</div>
<div class="am-u-lg-10 am-u-md-12 am-u-sm-12">
  <h3>{{$value['title']}}</h3>
  <p>
    {{$value['detail']}}
  </p>
</div>
</li>
@endforeach
  </ul>
</div>
</section>