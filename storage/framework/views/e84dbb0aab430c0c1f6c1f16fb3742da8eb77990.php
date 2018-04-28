<footer class="m-footer">
<div class="am-container">
    <section class="am-g m-footer-container">
        <section class="am-u-sm-12 am-u-md-12 am-u-lg-6">
            <h2>关于我们</h2>
            <p><?php echo e(StrShort($abouts,0,200)); ?><a href="<?php echo e(url('about')); ?>" rel="nofollow">&nbsp;更多</a></p>
        </section>
        <section class="am-u-sm-12 am-u-md-12 am-u-lg-6">
            <h2>底部导航</h2>
<?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url($key)); ?>" rel="nofollow"><?php echo e($value); ?></a>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <a href="<?php echo e(url('address')); ?>" rel="nofollow">公司地点</a>
        </section>
        </section>
    </div>
<div class="m-footer-bottom">
    <div class="am-container">
    <div class="am-g">
        <span class="m-u-sm-12 am-u-md-9 am-u-lg-10">Copyright&nbsp;&copy;&nbsp;2013-2018&nbsp;All&nbsp;Rights&nbsp;Reserved&nbsp;<a href="http://www.hbdlhz.com" rel="external nofollow">武汉鼎力合众文化传播有限公司</a>&nbsp;版权所有&nbsp;鄂ICP备13011440号-2</span>
        <span class="m-u-sm-12 am-u-md-3 am-u-lg-2 ico am-text-right am-hide-sm-only a">
            <a href="" data-am-popover="{content: '12915179', trigger: 'hover focus'}" rel="nofollow"><i class="am-icon-qq"></i></a>
            <a href="" data-am-popover="{content: '134-7614-6658', trigger: 'hover focus'}" rel="nofollow"><i class="am-icon-phone-square"></i></a>
            <a href="" data-am-popover="{content: '鼎力合众', trigger: 'hover focus'}" rel="nofollow"><i class="am-icon-weixin"></i></a>
            <a href="" data-am-popover="{content: '12915179@qq.com', trigger: 'hover focus'}" rel="nofollow"><i class="am-icon-envelope"></i></a>
        </span>
    </div>
    </div>
</div>
</footer>