@extends('layouts.admins.frame')
@section('slider')
@include('layouts.admins.sliders.users.add')
@endsection
@section('content')
@include('layouts.admins.contents.users.add')
@endsection
@section('script')
@include('layouts.admins.script')
<script type="text/javascript">
$('#user-password-2').blur(function(){
	var pass=$('#user-password-1').val();
	if(pass!=$(this).val()){
		$(this).attr('class','am-form-field');
		$('#user-password-1').attr('class','am-form-field');
		$('#div-password-1').attr('class','am-form-group am-form-error');
		$('#div-password-2').attr('class','am-form-group am-form-error');
	}else{
		$(this).attr('class','');
		$('#user-password-1').attr('class','');
		$('#div-password-1').attr('class','am-form-group');
		$('#div-password-2').attr('class','am-form-group');
	}
});
</script>
@if (count($errors)>0)
    <div class="am-modal am-modal-alert" tabindex="-1" id="alert-modal">
  <div class="am-modal-dialog">
    <div class="am-modal-hd">
@if ($errors['status']==1)
<i class="am-icon-check" style="color: green;"></i><span id="title" style="color: green;">
@else
<i class="am-icon-warning" style="color: red;"></i><span id="title" style="color: red;">
@endif
&nbsp;&nbsp;{{$errors['title']}}</span>
      <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
    </div>
    <div class="am-modal-bd">
        <span id='content'><strong>'{{$errors['content']}}'</strong></span>
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
@endif
@endsection