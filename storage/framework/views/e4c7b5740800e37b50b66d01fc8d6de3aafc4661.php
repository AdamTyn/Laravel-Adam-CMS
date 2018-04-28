<?php $__env->startSection('page'); ?>
<li class="tpl-left-nav-item">
    <a href="javascript:;" class="nav-link tpl-left-nav-link-list active">
    <i class="am-icon-table"></i>
    <span>前台管理</span>
<?php echo $__env->yieldContent('sec'); ?>
    </li>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.sliders.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>