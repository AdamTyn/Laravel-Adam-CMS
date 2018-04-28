<?php $__env->startSection('index'); ?>
<li class="tpl-left-nav-item">
    <a href="<?php echo e(url('admin')); ?>" class="nav-link active">
    <i class="am-icon-toggle-on"></i>
    <span>后台首页</span>
    </a>
</li>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.sliders.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>