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
                            <a href="{{url('admin/page-setting/news/add')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span>&nbsp;新增</a>
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
@foreach ($services as $id=>$value)
<tr>
    <td class="am-hide-sm-only">
        {{$id+1}}
    </td>
    <td>
        {{$value['title']}}
    </td>
    <td>
        <a href="{{url('admin/page-setting/service/update').'/'.$value['id']}}">{{ToTextarea(StrShort($value['detail'],0,100))}}</a>
    </td>
    <td class="am-hide-sm-only">
        {{$value['last_change']}}
    </td>
    <td>
        <div class="am-btn-toolbar">
            <div class="am-btn-group am-btn-group-xs">
                <button class="am-btn am-btn-default am-btn-xs am-text-secondary btn-edit" id="edit-{{$value['id']}}"><span class="am-icon-pencil-square-o"></span>&nbsp;修改
                </button>
                <button class="am-btn am-btn-default am-btn-xs am-text-danger am-hide-sm-only btn-delete"  id="delete-{{$value['id']}}"><span class="am-icon-trash-o" id="delete-{{$value['id']}}"></span>&nbsp;删除</button>
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
        $('#form').attr('action','{{url('admin/page-setting/service/update')}}'+'/'+ids[1]);
    });
    $('.btn-delete').click(function(){
        var ids=this.id.split('-');
        $('#form').attr('action','{{url('admin/page-setting/service/delete')}}'+'/'+ids[1]);
    });
</script>
</div>
</div>
</div>
<div class="tpl-alert">
</div>
</div>