<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>鼎力合众-后台</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="renderer" content="webkit">
  <meta http-equiv="Cache-Control" content="no-siteapp" />
  <link rel="alternate icon" type="image/x-icon" href="<?php echo e(asset('logo.ico')); ?>">
  <meta name="apple-mobile-web-app-title" content="鼎力合众后台" />
	<link rel="stylesheet" href="<?php echo e(asset('css/amazeui.min.css')); ?>"/>
	<link rel="stylesheet" href="<?php echo e(asset('css/admin.css')); ?>">
	<link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
</head>
<body data-type="login">
  <div class="am-g myapp-login">
	<div class="myapp-login-logo-block tpl-login-max">
		<div class="myapp-login-logo-text">
			<div class="myapp-login-logo-text">鼎力合众&nbsp;•<span>&nbsp;后台</span><i class="am-icon-skyatlas"></i>
			</div>
		</div>
		<div class="login-font">
			<i>登入系统</i>&nbsp;or&nbsp;<span><a href="<?php echo e(url('/')); ?>">返回前台</a></span>
		</div>
		<div class="am-u-sm-10 login-am-center">
			<?php echo e(Form::open(['url' => 'login', 'method' => 'post','class'=>'am-form'])); ?>

			<fieldset>
				<div class="am-form-group">
					<?php echo e(Form::text('name','',['id'=>'doc-ipt-email-1','placeholder'=>'输入用户名'])); ?>

				</div>
				<div class="am-form-group">
					<?php echo e(Form::password('password',['id'=>'doc-ipt-pwd-1','placeholder'=>'输入密码'])); ?>

				</div>
				<p>
					<?php echo e(Form::button('登录',['type'=>'submit','class'=>'am-btn am-btn-default'])); ?>

				</p>
			</fieldset>
			<?php echo e(Form::close()); ?>

		</div>
	</div>
</div>
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/amazeui.min.js')); ?>"></script>
<?php if(count($errors)>0): ?>
	<div class="am-modal am-modal-alert" tabindex="-1" id="alert-modal">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">
    	<i class="am-icon-warning" style="color: red;"></i><span id="title" style="color: red;">&nbsp;&nbsp;<?php echo e($errors['title']); ?></span>
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
        <span id='content'><?php echo e($errors['content']); ?></span>
    </div>
    <div class="am-modal-footer">
      <span class="am-modal-btn" data-am-modal-confirm>确定</span>
    </div>
  </div>
</div>
<script type="text/javascript">
$(function(){
	var $modal = $('#alert-modal');
    $modal.modal({
    	relatedTarget: this,
    	closeViaDimmer:false,
        onConfirm: function(e) {
          location.reload();
        },
    });
    $modal.on('close.modal.amui', function(){
      location.reload();
    });
});
<?php endif; ?>
</script>
</body>
</html>