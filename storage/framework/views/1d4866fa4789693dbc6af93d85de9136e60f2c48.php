<ul class="tpl-left-nav-menu">
<?php $__env->startSection('index'); ?>
    <li class="tpl-left-nav-item">
        <a href="<?php echo e(url('admin')); ?>" class="nav-link">
        <i class="am-icon-toggle-on"></i>
        <span>后台首页</span>
        </a>
    </li>
<?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('page'); ?>
    <li class="tpl-left-nav-item">
    <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
    <i class="am-icon-table"></i>
    <span>&nbsp;前台管理</span>
  <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
    </a>
    <ul class="tpl-left-nav-sub-menu" style="display:block">
        <li>
        <a href="<?php echo e(url('admin/page-setting/page')); ?>">
        <i class="am-icon-angle-right"></i>
        <span>页面配置</span>
        </a>
        <a href="<?php echo e(url('admin/page-setting/service')); ?>">
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
    </li>
<?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('user'); ?>
    <li class="tpl-left-nav-item">
    <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
    <i class="am-icon-users"></i>
    <span>用户管理</span>
    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr am-margin-right tpl-left-nav-more-ico-rotate"></i>
    </a>
    <ul class="tpl-left-nav-sub-menu" style="display:block">
        <li>
        <a href="<?php echo e(url('admin/user-setting/list')); ?>">
        <i class="am-icon-angle-right"></i>
        <span>用户列表</span>
        </a>
        <a href="<?php echo e(url('admin/user-setting/add')); ?>">
        <i class="am-icon-angle-right"></i>
        <span>添加用户</span>
        </a>
        </li>
    </ul>
    </li>
<?php echo $__env->yieldSection(); ?>
<?php $__env->startSection('system'); ?>
    <li class="tpl-left-nav-item">
    <a href="javascript:;" class="nav-link tpl-left-nav-link-list">
    <i class="am-icon-object-group"></i>
    <span>系统管理</span>
    <i class="am-icon-angle-right tpl-left-nav-more-ico am-fr"></i>
    </a>
    <ul class="tpl-left-nav-sub-menu">
        <li>
        <a href="<?php echo e(url('admin/system/data')); ?>">
        <i class="am-icon-angle-right"></i>
        <span>数据统计</span>
        </a>
        <a href="<?php echo e(url('admin/system/log')); ?>">
        <i class="am-icon-angle-right"></i>
        <span>系统日志</span>
        </a>
        </li>
    </ul>
    </li>
<?php echo $__env->yieldSection(); ?>
</ul>