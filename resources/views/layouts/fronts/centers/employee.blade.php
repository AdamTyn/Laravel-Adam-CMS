<nav class="m-cat-nav">
	<ul class="am-container">    
@foreach ($navs as $key=>$value)
@if ($key=='/')
@else
	<li id="{{$key}}"><a href="{{url($key)}}"><i class="icon-chevron-right"></i>{{$value}}</a></li>
@endif  
@endforeach
	<li><a href="{{url('address')}}"><i class="icon-chevron-right"></i>公司地点</a></li>
	</ul>
</nav>
<script type="text/javascript">
$(function(){
	$('#employee').attr('class','am-active');
});
</script>