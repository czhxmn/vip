@extends('layout.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    内容区域
<div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">
                            订单修改
                        </div>
                        <div class="widget-function am-fr">
                            <a href="javascript:;" class="am-icon-cog">
                            </a>
                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        <form action="/admin/order/{{$res->oid}}" method="post" enctype="multipart/form-data" class="am-form tpl-form-line-form">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">
                                    订单号
                                    <span class="tpl-form-line-small-title">
                                        oid
                                    </span>
                                </label>
                                <div class="am-u-sm-9">
                                    {{$oid}}
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-phone" class="am-u-sm-3 am-form-label">
                                    收件人
                                    <span class="tpl-form-line-small-title">
                                        receiver
                                    </span>
                                </label>
                                <div class="am-u-sm-9">

                                    <input type="text" name="receiver" value="{{$res->receiver}}">

                                </div>
                            </div>
                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">
                                    收件地址
                                    <span class="tpl-form-line-small-title">
                                        address
                                    </span>
                                </label>
                                <div class="am-u-sm-9">

                                    <input type="text" name="address" value="{{$res->address}}">

                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                                    联系方式
                                    <span class="tpl-form-line-small-title">
                                        tel
                                    </span>
                                </label>
                                <div class="am-u-sm-9">

                                    <input type="text" name="tel" value="{{$res->tel}}">

                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                                    状态
                                    <span class="tpl-form-line-small-title">
                                        status
                                    </span>
                                </label>
                                <div class="am-u-sm-9">
                                    <input type="radio" name="status" value="1">未发货
                                    <input type="radio" name="status" value="2">发货
                                    <div>
                                    </div>
                                </div>
                            </div>
                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    {{csrf_field()}}
                                    {{method_field("PUT")}}
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                                        提交
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection