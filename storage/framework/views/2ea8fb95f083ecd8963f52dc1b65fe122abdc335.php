<?php $__env->startSection('user'); ?>
<li class="tpl-left-nav-item">
    <a href="javascript:;" class="nav-link tpl-left-nav-link-list active">
    <i class="am-icon-users"></i>
    <span>用户管理</span>
<?php echo $__env->yieldContent('sec'); ?>
    </li>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.sliders.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>