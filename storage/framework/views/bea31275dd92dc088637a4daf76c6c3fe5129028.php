<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>鼎力后台</title>
<meta name="description" content="">
<meta name="keywords" content="">
<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp"/>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo e(asset('images/logo.ico')); ?>" media="screen"/>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(asset('css/amazeui.min.css')); ?>"/>
<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body data-type="index">
<?php echo $__env->make('layouts.admins.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<div class="tpl-page-container tpl-page-header-fixed">
<?php echo $__env->make('layouts.admins.slider', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->yieldContent('content'); ?>
</div>
<?php echo $__env->yieldContent('script'); ?>
</body>
</html>