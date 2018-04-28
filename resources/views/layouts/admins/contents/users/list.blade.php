<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">鼎力后台</div>
    <ol class="am-breadcrumb">
        <li>
        <a class="am-icon-home" href="#">管理员</a>
        </li>
        <li class="am-active">列表</li>
    </ol>
    <div class="tpl-content-scope">
        <div class="note note-info">
            <h3>欢迎登录!&nbsp;鼎力后台系统
                <span class="close" data-close="note"></span>
            </h3>
            <p>
                <span class="label label-success">Top：</span>&nbsp;我们致力于帮助企业成为有竞争力的互联网公司，让天下没有难做的生意
            </p>
        </div>
    </div>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-user">
                </span>&nbsp;管理员列表</div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
            </div>
            <div class="am-g">
                <div class="am-u-sm-12">
                    <form class="am-form">
                        <table class="am-table am-table-striped am-table-hover table-main">
                        <thead>
                        <tr>
                            <th class="table-id">
                                        ID
                            </th>
                            <th class="table-title">
                                        管理员名称
                            </th>
                            <th class="table-type">
                                        管理员权限
                            </th>
                            <th class="table-author am-hide-sm-only">
                                        登录状态
                            </th>
                            <th class="table-date am-hide-sm-only">
                                        最后登入IP
                            </th>
                            <th class="table-set">
                                        最后登入日期
                            </th>
                        </tr>
                        </thead>
                        <tbody>
@foreach ($users as $value)
<tr>
                            <td>
                                        {{$value['id']}}
                            </td>
                            <td>
                                <a href="{{ url('admin/user-setting/update').'/'.$value['id']}}">{{$value['name']}}</a>
                            
                            </td>
                            <td>
@if ($value['role']==0)
    Normal
@else
    Super
@endif
                            </td>
                            <td class="am-hide-sm-only">
                            {{$value['status']}}
                            </td>
                            <td class="am-hide-sm-only">
                            {{$value['last_ip']}}
                            </td>
                            <td>
                                {{$value['last_login']}}
                            </td>
                        </tr>
@endforeach
                        </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>