<?php $__env->startSection('title'); ?>
<title>鼎力合众</title>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.fronts.content', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.fronts.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>