<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
               鼎力后台
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-mixcloud">友商</a></li>
        <li><a href="<?php echo e(url('admin/page-setting/urls')); ?>">管理</a></li>
        <li class="am-active">修改</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-mixcloud"></span>&nbsp;修改友商
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
                <div class="tpl-form-body tpl-form-line">
                    <?php echo e(Form::open(['url'=>url('admin/page-setting/urls/update'.'/'.$urls['id']),'method'=>'post','class'=>'am-form tpl-form-line-form','files'=>true])); ?>

                        <div class="am-form-group">
                            <?php echo e(Form::label('title','#&nbsp;友商名称',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('title',$urls['title'],['class'=>'tpl-form-input','placeholder'=>'请输入名称'])); ?>

                                <span style="font-size: 12px;color: blue;">名称6-20字左右</span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <?php echo e(Form::label('','#&nbsp;编辑时间',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('',date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']),['readonly'=>true])); ?>

                            </div>
                        </div>
                        <div class="am-form-group">
                            <?php echo e(Form::label('','#&nbsp;友商图片',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <div class="am-form-group am-form-file">
                                    <div class="tpl-form-file-img">
                                        <?php echo e(Html::image(asset($urls['picture']),'',['id'=>'picture'])); ?>

                                        <small><span style="color:blue;" id="picture-span"><?php echo e(substr($urls['picture'],7)); ?></span></small>
                                    </div>
                                    <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i>&nbsp;修改图片</button>
                                    <?php echo e(Form::file('picture',['id'=>'picture-file'])); ?>

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