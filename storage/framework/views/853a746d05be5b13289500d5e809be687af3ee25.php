<?php $__env->startSection('slider'); ?>
<?php echo $__env->make('layouts.admins.sliders.pages.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<?php echo $__env->make('layouts.admins.contents.pages.page', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php echo $__env->make('layouts.admins.script', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php if(count($errors)>0): ?>
    <div class="am-modal am-modal-alert" tabindex="-1" id="alert-modal">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">
<?php if($errors['status']==1): ?>
<i class="am-icon-check" style="color: green;"></i><span id="title" style="color: green;">
<?php else: ?>
<i class="am-icon-warning" style="color: red;"></i><span id="title" style="color: red;">
<?php endif; ?>
&nbsp;&nbsp;<?php echo e($errors['title']); ?></span>
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
        <span id='content'><strong>'<?php echo e($errors['content']); ?>'</strong>&nbsp;&nbsp;页面已经修改</span>
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
        console.log('modal is closing');
        location.reload();
    });
});
</script>
<?php endif; ?>
<script type="text/javascript">
   $('.page-select').change(function() {
    var val = $(this).val();
    var url='<?php echo e(url('admin/page-setting/page')); ?>';
    var asset='<?php echo e(asset('')); ?>';
    switch(val){
        case 'service':
        $('#div-top-title').hide();
        $.get(url + '/'+val, {'page':'service'}, function(back) {
            $('#top-text').val(back.top_txt);
            $("#top-img").attr("src", asset+'/'+back.top_img);
            $("#form").attr("action", url + '/update/'+val);
        });
        break;
        case 'news':
        $('#div-top-title').hide();
        $.get(url +'/'+ val, {'page':'news'}, function(back) {
            $('#top-text').val(back.top_txt);
            $("#top-img").attr("src", asset+'/'+back.top_img);
            $("#form").attr("action", url + '/update/'+val);
        });
        break;
        case 'work':
        $('#div-top-title').hide();
        $.get(url + '/'+val, {'page':'work'}, function(back) {
            $('#top-text').val(back.top_txt);
            $("#top-img").attr("src", asset+'/'+back.top_img);
            $("#form").attr("action", url + '/update/'+val);
        });
        break;
        case 'employee':
        $('#div-top-title').hide();
        $.get(url +'/'+ val, {'page':'employee'}, function(back) {
            $('#top-text').val(back.top_txt);
            $("#top-img").attr("src", asset+'/'+back.top_img);
            $("#form").attr("action", url + '/update/'+val);
        });
        break;
        case 'about':
        $('#div-top-title').hide();
        $.get(url + '/'+val, {'page':'about'}, function(back) {
            $('#top-text').val(back.top_txt);
            $("#top-img").attr("src", asset+'/'+back.top_img);
            $("#form").attr("action", url + '/update/'+val);
        });
        break;
        case 'contact':
        $('#div-top-title').hide();
        $.get(url +'/'+ val, {'page':'contact'}, function(back) {
            $('#top-text').val(back.top_txt);
            $("#top-img").attr("src", asset+'/'+back.top_img);
            $("#form").attr("action", url + '/update/'+val);
        });
        break;
        default:
        $.get(url+'/index', {'page':'index'}, function(back) {
            $('#div-top-title').show();
            $('#top-title').val(back.top_title);
            $('#top-text').val(back.top_txt);
            $("#top-img").attr("src", asset+'/'+back.top_img);
            $("#form").attr("action", url + '/update/index');
        });
        break;
    }
   });

   $("#top-file").change(function() {
    var objUrl = getObjectURL(this.files[0]);
    console.log("objUrl = " + objUrl);
    if (objUrl) {
        $("#top-img").attr("src", objUrl);
    }
   });

   $("#buttom-file").change(function() {
    var objUrl = getObjectURL(this.files[0]);
    console.log("objUrl = " + objUrl);
    if (objUrl) {
        $("#buttom-img").attr("src", objUrl);
    }
   });

   function getObjectURL(file) {
    var temp = null;
    if (window.createObjectURL != undefined) { // basic  
        temp = window.createObjectURL(file);
    } else if (window.URL != undefined) { // mozilla(firefox)  
        temp = window.URL.createObjectURL(file);
    } else if (window.webkitURL != undefined) { // webkit or chrome  
        temp = window.webkitURL.createObjectURL(file);
    }
    return temp;
   }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.admins.frame', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>