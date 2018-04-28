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
@foreach ($logs as $key=>$value)
<tr>
    <td class="am-hide-sm-only">
        {{$key+1}}
    </td>
    <td>
        {{$value->content}}
    </td>
    <td>
        {{$value->user}}
    </td>
    <td class="am-hide-sm-only">
        {{$value->time}}
    </td>
</tr>
@endforeach 
</tbody>
</table>
</form>
</div>
</div>
</div>
<div class="tpl-alert">
</div>
</div>