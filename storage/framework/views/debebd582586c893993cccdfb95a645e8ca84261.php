<?php $__env->startSection('sec'); ?>
<i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i></a>
    </a>
<ul class="tpl-left-nav-sub-menu" style="display:block">
    <li>
    <a href="<?php echo e(url('admin/page-setting/page')); ?>">
    <i class="am-icon-angle-right"></i>
    <span>页面配置</span>
    </a>
    <a class="active" href="<?php echo e(url('admin/page-setting/service')); ?>">
    <i class="am-icon-angle-right"></i>
    <span>服务内容</span>
    </a>
    <a href="<?php echo e(url('admin/page-setting/news')); ?>">
    <i class="am-icon-angle-right"></i>
    <span>动态管理</span>
    </a>
    <a href="<?php echo e(url('admin/page-setting/work')); ?>">
    <i class="am-icon-angle-right"></i>
    <span>案例管理</span>
    </a>
    <a href="<?php echo e(url('admin/page-setting/employee')); ?>">
    <i class="am-icon-angle-right"></i>
    <span>招聘发布</span>
    </a>
    <a href="<?php echo e(url('admin/page-setting/urls')); ?>">
    <i class="am-icon-angle-right"></i>
    <span>合作伙伴</span>
    </a>
    </li>
</ul>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.sliders.pages.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>