<div class="tpl-content-wrapper">
<div class="tpl-content-page-title">鼎力后台</div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-street-view">服务</a></li>
        <li class="am-active">管理</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-street-view"></span>&nbsp;服务列表
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-u-sm-12 am-u-md-6">
                    <div class="am-btn-toolbar">
                        <div class="am-btn-group am-btn-group-xs">
                            <a href="<?php echo e(url('admin/page-setting/news/add')); ?>" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>&nbsp;新增</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form" id="form" method="get">
                        <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id am-hide-sm-only">
                                序号
                            </th>
                            <th>
                                标题
                            </th>
                            <th>
                                简介
                            </th>
                            <th class="table-date am-hide-sm-only">
                                最后修改日期
                            </th>
                            <th>
                                操作
                            </th>
                        </tr>
                        </thead>
                        <tbody>
<?php $__currentLoopData = $services; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $id=>$value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td class="am-hide-sm-only">
        <?php echo e($id+1); ?>

    </td>
    <td>
        <?php echo e($value['title']); ?>

    </td>
    <td>
        <a href="<?php echo e(url('admin/page-setting/service/update').'/'.$value['id']); ?>"><?php echo e(ToTextarea(StrShort($value['detail'],0,100))); ?></a>
    </td>
    <td class="am-hide-sm-only">
        <?php echo e($value['last_change']); ?>

    </td>
    <td>
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
                <button class="am-btn am-btn-default am-btn-xs am-text-secondary btn-edit" id="edit-<?php echo e($value['id']); ?>"><span class="am-icon-pencil-square-o"></span>&nbsp;修改
                </button>
                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only btn-delete"  id="delete-<?php echo e($value['id']); ?>"><span class="am-icon-trash-o" id="delete-<?php echo e($value['id']); ?>"></span>&nbsp;删除</button>
            </div>
        </div>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
</tbody>
</table>
</form>
<script type="text/javascript">
    $('.btn-edit').click(function(){
        var ids=this.id.split('-');
        $('#form').attr('action','<?php echo e(url('admin/page-setting/service/update')); ?>'+'/'+ids[1]);
    });
    $('.btn-delete').click(function(){
        var ids=this.id.split('-');
        $('#form').attr('action','<?php echo e(url('admin/page-setting/service/delete')); ?>'+'/'+ids[1]);
    });
</script>
</div>
</div>
</div>
<div class="tpl-alert">
</div>
</div>