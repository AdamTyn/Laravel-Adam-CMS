<?php $__env->startSection('sec'); ?>
<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i></a>
    </a>
<ul class="tpl-left-nav-sub-menu" style="display:block">
    <li>
        <a href="<?php echo e(url('admin/system/data')); ?>">
        <i class="am-icon-angle-right"></i>
        <span>数据统计</span>
        </a>
        <a class="active" href="<?php echo e(url('admin/system/log')); ?>">
        <i class="am-icon-angle-right"></i>
        <span>系统日志</span>
        </a>
    </li>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.sliders.systems.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>