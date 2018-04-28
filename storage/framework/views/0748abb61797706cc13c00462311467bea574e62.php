<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">鼎力后台</div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-pagelines">页面</a></li>
        <li class="am-active">配置</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-pagelines"></span>&nbsp;配置项
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
                <div class="am-u-sm-3 am-u-md-3">
                </div>
                <div class="am-u-sm-9 am-u-md-9">
                    <div class="am-form-group">
                        <select data-am-selected="{btnSize: 'sm'}" style="display: none;" class="page-select">
<?php $__currentLoopData = $navs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($key); ?>"><?php echo e($value); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </select>
                    </div>
                </div>
            </div>
<div class="am-g">
    <div class="tpl-form-body tpl-form-line">
        <?php echo e(Form::open(['url'=>url('admin/page-setting/page/update').'/index','method'=>'post','class'=>'am-form tpl-form-line-form','files'=>true,'id'=>'form'])); ?>

            <div class="am-form-group" id="div-top-title">
                <?php echo e(Form::label('top-title','#置顶标题&nbsp;',['class'=>'am-u-sm-3 am-form-label'])); ?>

                <div class="am-u-sm-9">
                    <?php echo e(Form::text('top-title',$homes['top_txt'][0],['placeholder'=>'请输入置顶标题','id'=>'top-title','class'=>'tpl-form-input'])); ?>

                    <span style="font-size: 12px;color: blue;">标题6-12字左右</span>
                </div>
            </div>
            <div class="am-form-group">
                <?php echo e(Form::label('top-text','#置顶文字&nbsp;',['class'=>'am-u-sm-3 am-form-label'])); ?>

                <div class="am-u-sm-9">
                    <?php echo e(Form::text('top-text',$homes['top_txt'][1],['placeholder'=>'请输入置顶文字','id'=>'top-text','class'=>'tpl-form-input'])); ?>

                    <span style="font-size: 12px;color: blue;">文字10-20字左右</span>
                </div>
            </div>
            <div class="am-form-group">
                <?php echo e(Form::label('top-file','#置顶图片&nbsp;',['class'=>'am-u-sm-3 am-form-label'])); ?>

                <div class="am-u-sm-9">
                    <div class="am-form-group am-form-file">
                        <div class="tpl-form-file-img">
                            <img src="<?php echo e(asset($homes['top_img'])); ?>" id="top-img">
                        </div>
                        <?php echo e(Form::button('<i class="am-icon-cloud-upload"></i>&nbsp;修改置顶图片',['class'=>'am-btn am-btn-danger am-btn-sm'])); ?>

                        <?php echo e(Form::file('top-img',['id'=>'top-file'])); ?>

                    </div>
                </div>
            </div>
            <div class="am-form-group">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <?php echo e(Form::submit('确认修改',['class'=>'am-btn am-btn-primary tpl-btn-bg-color-success'])); ?>

                </div>
            </div>
        <?php echo e(Form::close()); ?>

    </div>
</div>
</div>
</div>
</div>