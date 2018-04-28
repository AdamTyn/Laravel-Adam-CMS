<div data-am-widget="slider" class="am-slider am-slider-i2" data-am-flexslider="{controlNav:false}">
    <ul class="am-slides">
        <li class="am-slider-images" style="background-image: url('<?php echo e(asset($homes['top_img'])); ?>');">
            <div class="am-container am-slider-desc">
                <div class="am-slider-content">
                    <h2 class="am-slider-title"><?php echo e($homes['top_txt'][0]); ?></h2>
                    <p><?php echo e($homes['top_txt'][1]); ?></p>
                    <a href="#service-div" class="am-btn-xs am-btn am-btn-danger am-radius" rel="nofollow">READ&nbsp;MORE</a>
                </div>
            </div>
        </li>
    </ul>
</div>
<div class="m-services m-home-box" id="service-div">
    <section class="am-container">
        <hgroup>
            <h2>我们的服务</h2>
            <p><?php echo e($services['top_txt']); ?></p>
        </hgroup>
        <ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-6 am-thumbnails">
<?php $__currentLoopData = $services['contents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<li>
                <h2><?php echo e($value['title']); ?></h2>
                <p><?php echo e($value['detail']); ?></p>
            </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </section>
</div>
<div class="am-container m-home-box">
        <hgroup>
            <h2>案例展示</h2>
            <p><?php echo e($works['top_txt']); ?></p>
        </hgroup>
        <section class="m-case-list">
            <ul class="am-avg-sm-1 am-avg-md-3 am-avg-lg-3 am-thumbnails">
<?php $__currentLoopData = $works['contents']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($key==6) break; ?>
<li>
    <figure class="effect-lily">
        <img alt="<?php echo e($value['title']); ?>" src="<?php echo e($value['picture']); ?>" class="am-img-responsive">
        <figcaption>
            <h3><?php echo e($value['title']); ?></h3>
            <?php echo $value['detail']; ?>

            <a href="javascript:void(0);">View more</a>
        </figcaption>
    </figure>
</li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </section>
</div>
<section class="am-container m-home-box m-partner">
    <hgroup>
        <h2>协助伙伴</h2>
        <p>用最具影响力品牌协助，并全力协助新兴品牌，我们以设计助力众多品牌走向行业领先地位，鼎力相助每一个梦想。</p>
    </hgroup>
    <ul class="am-avg-lg-8 am-avg-md-8 am-avg-sm-2 am-thumbnails">
<?php $__currentLoopData = $urls; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($key==16) break; ?>
    <li>
        <img src="<?php echo e(asset($value[0]['picture'])); ?>" class="am-img-responsive">
    </li>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
</section>
<div class="m-home-box m-contact" style="background-color: #2b3242;">
    <section class="am-container">
        <hgroup>
            <h2>联系我们</h2>
            <p>你可以通过以下方式和我们取得联系。</p>
        </hgroup>
        <ul class="am-avg-lg-4 am-avg-md-4 am-avg-sm-2 am-thumbnails">
            <li><i class="am-icon-qq"></i>&nbsp;12915179</li>
            <li><i class="am-icon-phone-square"></i>&nbsp;134-7614-6658</li>
            <li>
                <i class="am-icon-weixin"></i>&nbsp;鼎力合众</li>
            <li>
                <i class="am-icon-envelope"></i>&nbsp;12915179@qq.com</li>
        </ul>
    </section>
</div>
<div class="m-contact-us">
    <section class="am-container">
        <div class="am-g">
            <span class="m-u-sm-12 am-u-md-9 am-u-lg-10"">想拥有不一样的高端互联网营销，你还在等什么？点击马上和我们联系！</span>
            <span class="m-u-sm-12 am-u-md-3 am-u-lg-2">
                <a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=12915179&site=qq&menu=yes" class="am-btn am-btn-danger am-radius" rel="external nofollow">马上联系</a>
            </span>
        </div>
    </section>
</div>