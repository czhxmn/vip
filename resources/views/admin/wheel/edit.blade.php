@extends('layout.admin')

@section('content')

    <div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">
            线条表单
        </div>

    </div>
    <div class="widget-body am-fr">

        <form class="am-form tpl-form-line-form" action="/admin/carouses/{{$res->id}}" method="post" enctype='multipart/form-data'>
             {{ csrf_field() }}
             {{method_field('PUT')}}
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    标题
                    <span class="tpl-form-line-small-title">
                        Name
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" name='wname' value='{{$res->wname}}' class="tpl-form-input" id="user-name" >
                    <small>
                        标题不能为空
                    </small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                    图片
                    <span class="tpl-form-line-small-title">
                          &nbsp; &nbsp; &nbsp; &nbsp;Pic
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <!-- <img src="{{$res->pic}}" alt="" style="width:1100.63px;height: 227px;"> -->
                    <input type="file" name='pic' id="user-weibo" placeholder="请添加分类用点号隔开">
                    <div>
                    </div>
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-url" class="am-u-sm-3 am-form-label">
                    链接
                    <span class="tpl-form-line-small-title">
                        Url
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" name='pid' value='{{$res->pid}}' class="tpl-form-input" id="user-url" placeholder="请输入路径">
                    <small>

                    </small>
                </div>
            </div>

            <div class="am-form-group">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <button  type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                        提交
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection