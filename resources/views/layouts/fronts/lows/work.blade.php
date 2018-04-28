<div class="am-container m-list">
	<article>
        <section class="m-case-list">
            <ul class="am-avg-sm-1 am-avg-md-2 am-avg-lg-3 am-thumbnails">
@foreach ($works['contents'] as $value)
	<li>
	<figure class="effect-lily">
	<img alt="{{$value['title']}}" src="{{$value['picture']}}" class="am-img-responsive">
	<figcaption>
	<h3>{{$value['title']}}</h3>
	{!!$value['detail']!!}
	<a href="javascript:void(0);">View more</a>
	</figcaption>
	</figure>
	</li>
@endforeach
</ul>
</section>
</article>
</div>