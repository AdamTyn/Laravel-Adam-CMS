<div class="tpl-content-wrapper">
    <div class="tpl-content-page-title">
               鼎力后台
    </div>
    <ol class="am-breadcrumb">
        <li><a href="#" class="am-icon-user-plus">招聘</a></li>
        <li><a href="{{url('admin/page-setting/employee')}}">管理</a></li>
        <li class="am-active">修改</li>
    </ol>
    <div class="tpl-portlet-components">
        <div class="portlet-title">
            <div class="caption font-green bold">
                <span class="am-icon-user-plus"></span>&nbsp;修改招聘
            </div>
        </div>
        <div class="tpl-block">
            <div class="am-g">
                <div class="tpl-form-body tpl-form-line">
                    {{Form::open(['url'=>url('admin/page-setting/employee/update'.'/'.$employees['id']),'method'=>'post','class'=>'am-form tpl-form-line-form','files'=>true])}}
                        <div class="am-form-group">
                            {{Form::label('title','#&nbsp;招聘标题',['class'=>'am-u-sm-3 am-form-label'])}}
                            <div class="am-u-sm-9">
                                {{Form::text('title',$employees['title'],['class'=>'tpl-form-input','placeholder'=>'请输入标题'])}}
                                <span style="font-size: 12px;color: blue;">标题6-20字左右</span>
                            </div>
                        </div>
                        <div class="am-form-group">
                            {{Form::label('','#&nbsp;编辑时间',['class'=>'am-u-sm-3 am-form-label'])}}
                            <div class="am-u-sm-9">
                                {{Form::text('',date('Y-m-d H:i:s',$_SERVER['REQUEST_TIME']),['readonly'=>true])}}
                            </div>
                        </div>
                        <div class="am-form-group">
                            {{Form::label('','#&nbsp;招聘图片',['class'=>'am-u-sm-3 am-form-label'])}}
                            <div class="am-u-sm-9">
                                <div class="am-form-group am-form-file">
                                    <div class="tpl-form-file-img">
                                        {{Html::image(asset($employees['picture']),'',['id'=>'picture'])}}
                                        <small><span style="color:blue;" id="picture-span">{{substr($employees['picture'],7)}}</span></small>
                                    </div>
                                    <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                    <i class="am-icon-cloud-upload"></i>&nbsp;修改图片</button>
                                    {{Form::file('picture',['id'=>'picture-file'])}}
                                </div>
                            </div>
                        </div>
                        <div class="am-form-group">
                            {{Form::label('content','#&nbsp;招聘简介',['class'=>'am-u-sm-3 am-form-label'])}}
                            <div class="am-u-sm-9">
                                {{Form::textarea('content',ToTextarea($employees['content'],true),['rows'=>8])}}
                                <small><i class="am-icon-warning" style="color:red;"></i>&nbsp;使用&nbsp;<span style="color:red;">##</span>&nbsp;另起段落</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                {{Form::submit('确认修改',['class'=>'am-btn am-btn-primary tpl-btn-bg-color-success'])}}
                            </div>
                        </div>
                    {{Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>