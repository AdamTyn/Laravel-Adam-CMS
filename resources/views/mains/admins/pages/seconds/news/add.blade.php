@extends('layouts.admins.frame')
@section('slider')
@include('layouts.admins.sliders.pages.news')
@endsection
@section('content')
@include('layouts.admins.contents.pages.seconds.news.add')
@endsection
@section('script')
@include('layouts.admins.script')
@if(count($errors)>0)
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
<script type="text/javascript">
	$("#picture-file").change(function() {
    var objUrl = getObjectURL(this.files[0]);
    console.log("objUrl = " + objUrl);
    if (objUrl) {
        $("#picture").attr("src", objUrl);
        $('#picture-span').text($('#picture-file').val());
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
@endsection