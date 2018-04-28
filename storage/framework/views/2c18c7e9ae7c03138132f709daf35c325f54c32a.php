<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">鼎力后台</div>
    <ol class="am-breadcrumb">
    <li><a href="#" class="am-icon-home">首页</a></li>
    <li class="am-active">内容</li>
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
    <div class="row">
        <div class="am-u-lg-12 am-u-md-12 am-u-sm-12">
            <div class="tpl-portlet">
                <table class="am-table am-table-bordered am-table-radius  am-table-hover">
                    <caption><h2>系&nbsp;统&nbsp;环&nbsp;境&nbsp;信&nbsp;息</h2></caption>
                    <tbody>
                        <tr>
                            <td>服务器&nbsp;IP</td>
                            <td><?php echo e(GetHostByName($_SERVER['SERVER_NAME'])); ?></td>
                        </tr>
                        <tr>
                            <td>服务器信息</td>
                            <td><?php echo e(php_uname('v')); ?></td>
                        </tr>
                        <tr>
                            <td>系统端口</td>
                            <td><?php echo e(getenv('SERVER_PORT')); ?></td>
                        </tr>
                        <tr>
                            <td>系统版本</td>
                            <td>Version-1.0.0</td>
                        </tr>
                        <tr>
                            <td>当前&nbsp;IP</td>
                            <td><?php echo e(getenv("REMOTE_ADDR")); ?></td>
                        </tr>
                        <tr>
                            <td>当前时间</td>
                            <td><?php echo e(date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME'])); ?></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>