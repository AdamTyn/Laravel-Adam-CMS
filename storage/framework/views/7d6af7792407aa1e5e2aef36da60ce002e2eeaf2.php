<?php $__env->startSection('sec'); ?>
<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i></a>
    </a>
<ul class="tpl-left-nav-sub-menu" style="display:block">
	<li>
	<a class="active" href="<?php echo e(url('admin/user-setting/list')); ?>">
	<i class="am-icon-angle-right"></i>
	<span>用户列表</span>
	</a>
	<a href="<?php echo e(url('admin/user-setting/add')); ?>">
	<i class="am-icon-angle-right"></i>
	<span>添加用户</span>
	</a>
	</li>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.sliders.users.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>