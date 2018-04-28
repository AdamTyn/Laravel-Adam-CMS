<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
               鼎力后台
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-refresh">动态</a></li>
        <li><a href="<?php echo e(url('admin/page-setting/news')); ?>">管理</a></li>
        <li class="am-active">添加</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-refresh"></span>&nbsp;添加动态
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
                <div class="tpl-form-body tpl-form-line">
                    <?php echo e(Form::open(['url'=>url('admin/page-setting/news/add'),'method'=>'post','class'=>'am-form tpl-form-line-form','files'=>true])); ?>

                        <div class="am-form-group">
                            <?php echo e(Form::label('title','#&nbsp;动态标题',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('title','',['class'=>'tpl-form-input','placeholder'=>'请输入标题'])); ?>

                                <span style="font-size: 12px;color: blue;">标题6-20字左右</span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <?php echo e(Form::label('','#&nbsp;编辑时间',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('',date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']),['readonly'=>true])); ?>

                            </div>
                        </div>
                        <div class="am-form-group">
                            <?php echo e(Form::label('','#&nbsp;动态主图',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <div class="am-form-group am-form-file">
                                    <div class="tpl-form-file-img">
                                        <?php echo e(Html::image('','',['id'=>'picture'])); ?>

                                        <small><span style="color:blue;" id="picture-span"></span></small>
                                    </div>
                                    <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i>&nbsp;添加主图</button>
                                    <?php echo e(Form::file('picture',['id'=>'picture-file'])); ?>

                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <?php echo e(Form::label('content','#&nbsp;动态内容',['class'=>'am-u-sm-3 am-form-label'])); ?>

                            <div class="am-u-sm-9">
                                <?php echo e(Form::textarea('content','',['rows'=>8,'placeholder'=>'例如: 段落1##段落2'])); ?>

                                <small><i class="am-icon-warning" style="color:red;"></i>&nbsp;使用&nbsp;<span style="color:red;">##</span>&nbsp;另起段落</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <?php echo e(Form::submit('确认添加',['class'=>'am-btn am-btn-primary tpl-btn-bg-color-success'])); ?>

                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>