<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
        鼎力后台
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-home">管理员</a></li>
        <li class="am-active">添加</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-user"></span>&nbsp;添加管理员</div>
        </div>
        <div class="tpl-block ">
            <div class="am-g tpl-amazeui-form">
                <div class="am-u-sm-12 am-u-md-9">
                    <?php echo e(Form::open(['url'=>url('admin/user-setting/add/insert'),'method'=>'post','class'=>'am-form am-form-horizontal'])); ?>

                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">#&nbsp;管理员名</label>
                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('name','',['id'=>'user-name','placeholder'=>'输入管理员名'])); ?>

                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-email" class="am-u-sm-3 am-form-label">#&nbsp;电子邮件</label>
                            <div class="am-u-sm-9">
                                <?php echo e(Form::text('email','',['placeholder'=>'输入电子邮件','id'=>'user-email'])); ?>

                            </div>
                        </div>
                        <div class="am-form-group" id="div-password-1">
                            <label for="user-password-1" class="am-u-sm-3 am-form-label">#&nbsp;输入密码</label>
                            <div class="am-u-sm-9">
                                <?php echo e(Form::password('password',['id'=>'user-password-1','placeholder'=>'输入密码'])); ?>

                            </div>
                        </div>
                        <div class="am-form-group" id="div-password-2">
                            <label for="user-password-2" class="am-u-sm-3 am-form-label">#&nbsp;确认密码</label>
                            <div class="am-u-sm-9">
                                <?php echo e(Form::password('password-2',['id'=>'user-password-2','placeholder'=>'确认密码'])); ?>

                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <?php echo e(Form::submit('确认添加',['class'=>'am-btn am-btn-primary','type'=>'button'])); ?>

                            </div>
                        </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
    </div>
</div>