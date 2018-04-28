<section class="am-container m-news">
<div class="m-container am-g">
<article class="am-cf">
@foreach ($news['contents'] as $value)
    <div class="am-u-lg-10 am-u-md-12 am-u-sm-12">
        <h3><a href="{{url('news').'/'.$value['id']}}">{{$value['title']}}</a></h3>
        <div class="m-news-data">
            <span><i class="am-icon-clock-o"></i>&nbsp;{{$value['last_change']}}</span>
        </div>
        <p class="m-news-desc">
            {{StrShort(ToTextarea($value['detail']),0,300)}}
        </p>
    </div>
@endforeach
</article>
</div>
</section>