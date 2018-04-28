<div class="tpl-content-wrapper">
<div class="tpl-content-page-title">鼎力后台</div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-refresh">系统</a></li>
        <li class="am-active">日志</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-book"></span>&nbsp;日志列表
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form" id="form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id am-hide-sm-only">
                                序号
                            </th>
                            <th>
                                内容
                            </th>
                            <th>
                                管理员名称
                            </th>
                            <th class="table-date am-hide-sm-only">
                                操作日期
                            </th>
                        </tr>
                        </thead>
                        <tbody>
<?php $__currentLoopData = $logs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td class="am-hide-sm-only">
        <?php echo e($key+1); ?>

    </td>
    <td>
        <?php echo e($value->content); ?>

    </td>
    <td>
        <?php echo e($value->user); ?>

    </td>
    <td class="am-hide-sm-only">
        <?php echo e($value->time); ?>

    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</tbody>
</table>
</form>
</div>
</div>
</div>
<div class="tpl-alert">
</div>
</div>