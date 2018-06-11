@extends('layout.admin')

@section('title','添加轮播图')

@section('content')

	<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">
            线条表单
        </div>
        <div class="widget-function am-fr">
            <a href="javascript:;" class="am-icon-cog">
            </a>
        </div>
    </div>
    <div class="widget-body am-fr">
        <form class="am-form tpl-form-line-form" method="post" action="/admin/carouses" enctype='multipart/form-data'>
        {{csrf_field()}}
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    标题
                    <span class="tpl-form-line-small-title">
                        Title
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" name='wname' class="tpl-form-input" id="user-name" placeholder="请输入标题文字">
                    <small>
                        标题不能为空
                    </small>
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label" >
                    图片
                    <span class="tpl-form-line-small-title">
                        Type
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="file" id="" name="pic" placeholder="">
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
                    <input type="text" value="https://" name='pid' class="tpl-form-input" id="user-url" placeholder="请输入路径">
                    <small>
                        例如: https://www.baidu.com
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-phone" class="am-u-sm-3 am-form-label">
                    状态
                    <span class="tpl-form-line-small-title">
                        status
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <select data-am-selected="{searchBox: 1}" style="display: none;"" name="status" >
                        <option value="1">
                            展示
                        </option>
                        <option value="0">
                            关闭
                        </option>
                    </select>
                </div>
            </div>


            <div class="am-form-group">
                <div class="am-u-sm-9 am-u-sm-push-3">

                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                        提交
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection