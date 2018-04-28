<div class="tpl-content-wrapper">
<div class="tpl-content-page-title">鼎力后台</div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-mixcloud">友商</a></li>
        <li class="am-active">管理</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-mixcloud"></span>&nbsp;友商列表
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-6">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                    <a href="{{url('admin/page-setting/urls/add')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>&nbsp;新增</a>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                名称
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
@foreach ($urls as $id=>$value)
<tr>
    <td class="am-hide-sm-only">
        {{$id+1}}
    </td>
    <td>
        <a href="{{url('admin/page-setting/urls/update').'/'.$value[0]['id']}}">{{$value[0]['title']}}</a>
    </td>
    <td class="am-hide-sm-only">
        {{$value[0]['last_change']}}
    </td>
    <td>
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
                <button class="am-btn am-btn-default am-btn-xs am-text-secondary btn-edit" id="edit-{{$value[0]['id']}}"><span class="am-icon-pencil-square-o"></span>&nbsp;修改
                </button>
                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only btn-delete"  id="delete-{{$value[0]['id'].'-'.strval($id+1)}}"><span class="am-icon-trash-o"></span>&nbsp;删除</button>
            </div>
        </div>
    </td>
</tr>
@endforeach 
</tbody>
</table>
</form>
<script type="text/javascript">
    $('.btn-edit').click(function(){
        var ids=this.id.split('-');
        $('#form').attr('action','{{url('admin/page-setting/urls/update')}}'+'/'+ids[1]);
    });
    $('.btn-delete').click(function(){
        var ids=this.id.split('-');
        $('#form').attr('action','{{url('admin/page-setting/urls/delete')}}'+'/'+ids[1]+'/'+ids[2]);
    });
</script>
</div>
</div>
</div>
<div class="tpl-alert">
</div>
</div>