<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
               鼎力后台
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-street-view">服务</a></li>
        <li><a href="<?php echo e(url('admin/page-setting/service')); ?>">管理</a></li>
        <li class="am-active">修改</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-street-view"></span>&nbsp;修改服务
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
                <div class="tpl-form-body tpl-form-line">
                    <?php echo e(Form::open(['url'=>url('admin/page-setting/service/update'.'/'.$service['id']),'method'=>'post','class'=>'am-form tpl-form-line-form','files'=>true])); ?>

                        <div class="am-form-group">
                            <?php echo e(Form::label('title','#&nbsp;服务标题',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('title',$service['title'],['class'=>'tpl-form-input','placeholder'=>'请输入标题'])); ?>

                                <span style="font-size: 12px;color: blue;">标题4-20字左右</span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <?php echo e(Form::label('','#&nbsp;编辑时间',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('',date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']),['readonly'=>true])); ?>

                            </div>
                        </div>
                        <div class="am-form-group">
                            <?php echo e(Form::label('content','#&nbsp;服务内容',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('content',$service['content'],['class'=>'tpl-form-input','placeholder'=>'请输入内容'])); ?>

                                <span style="font-size: 12px;color: blue;">内容30-150字左右</span>
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