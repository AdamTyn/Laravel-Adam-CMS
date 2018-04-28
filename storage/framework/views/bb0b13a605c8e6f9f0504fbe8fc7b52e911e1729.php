<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
<?php echo $__env->yieldContent('title'); ?>
	<meta name="description" content="武汉鼎力合众文化传播有限公司">
	<meta name="keywords" content="武汉鼎力合众文化传播有限公司">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp"/>
    <link rel="alternate icon" type="image/x-icon" href="<?php echo e(asset('images/logo.ico')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/amazeui.min.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/style.css')); ?>">
    <script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
</head>
<body>
<?php echo $__env->make('layouts.fronts.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('layouts.fronts.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('layouts.fronts.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</body>
</html>