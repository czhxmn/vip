@extends('layout.admin')

@section('content')

	<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">
            线条表单
        </div>
        
    </div>
    <div class="widget-body am-fr">
        <form class="am-form tpl-form-line-form" action="/admin/eval" method="post" enctype='multipart/form-data'>
             {{ csrf_field() }}
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-4 am-form-label">
                    评论人姓名
                    <span class="tpl-form-line-small-title">
                        Name
                    </span>
                </label>
                <div class="am-u-sm-8">
                    <input type="text" class="tpl-form-input" id="user-name" placeholder="{{$ping->name}}" disabled="disabled">
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-phone" class="am-u-sm-4 am-form-label">评轮时间 <span class="tpl-form-line-small-title">  Time</span></label>
                <div class="am-u-sm-8">
                    <input type="text"  class="tpl-form-input" id="user-name" placeholder="{{$ping->commentsTime}}" disabled="disabled">
                </div>
            </div>
          
            <div class="am-form-group">
                <label for="user-phone" class="am-u-sm-4 am-form-label">评论商品名称 <span class="tpl-form-line-small-title">Gname</span></label>
                <div class="am-u-sm-8">
                    <input type="text" class="tpl-form-input" id="user-name" placeholder="{{$good->gname}}" disabled="disabled">
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">
                    商品图片
                    <span class="tpl-form-line-small-title">
                          &nbsp; &nbsp; &nbsp; &nbsp;Img
                    </span>
                </label>
                <div class="am-u-sm-8">
                    <img src="{{$good->gpic}}"  style="width: 100px;height: 100px">
                    <div>
                    </div>
                </div>
            </div>

            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">
                    评论内容
                    <span class="tpl-form-line-small-title">
                          &nbsp; &nbsp; &nbsp; &nbsp;Text
                    </span>
                </label>
                <div class="am-u-sm-8">
                    <textarea cols="30" rows="10" disabled="disabled">{{$ping->content}}</textarea>
                    <div>
                    </div>
                </div>
            </div>

             <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">
                    评论等级
                    <span class="tpl-form-line-small-title">
                        &nbsp; &nbsp; &nbsp;DengJi
                    </span>
                </label>
                <div class="am-u-sm-8">
                    @if($ping->level == '1')
                        差评
                    @elseif($ping->level == '2')
                        中评
                    @elseif($ping->level == '3')
                        好评
                    @endif

                    <div>
                    </div>
                </div>
            </div>
            
            <div class="am-form-group">
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <a href="/admin/eval">返回评论列表页</a>
                </div>
            </div>
        </form>
    </div>
   

@endsection