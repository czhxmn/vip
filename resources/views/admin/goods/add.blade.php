@extends('layout.admin')

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
        <form action="/admin/good" class="am-form tpl-form-border-form tpl-form-border-br" method="post" enctype='multipart/form-data' >
            {{csrf_field()}}
            <div class="am-form-group">
                <label for="user-phone" class="am-u-sm-3 am-form-label">
                    商品分类 
                </label>
                <div class="am-u-sm-9">
                    <select data-am-selected="{searchBox: 1}" name='cid' style="display: none;">
                        <option value="0">顶级分类</option>
                        @foreach($res as $k=>$v)
                        <option value='{{$v->cid}}'>{{$v->cname}}</option>
                        @endforeach 
                    </select>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                    商品名称
                    
                </label>
                <div class="am-u-sm-9">
                    <input type="text" name='gname' id="user-weibo" placeholder="请添加商品">  
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    定价
                </label>
                <div class="am-u-sm-9">
                    <input type="text" name='price' class="tpl-form-input" id="user-name" placeholder=" 请填写定价">
                    <small>
                        请填写定价
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-email" class="am-u-sm-3 am-form-label">
                    库存
                </label>
                <div class="am-u-sm-9">
                    <input type="text" name='stock' class="tpl-form-input" id="user-name" placeholder=" 请填写定价">
                    <small>
                        请填写库存
                    </small>
                </div>
            </div>         
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                    图片
                </label>
                <div class="am-u-sm-9">
                    <input type="file" name='gpic' multiple id="user-weibo" placeholder="">
                    <div>
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-intro" class="am-u-sm-3 am-form-label">
                    详情
                </label>
                <div class="am-u-sm-9">
                    
                        <script id="editor" name="gdesc" type="text/plain" style="width:1024px;height:350px;"></script>
                    
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                    状态
                </label>
                <div class="am-u-sm-9">
                    新品:<input type="radio" name='status' value='0' id="user-weibo" checked>
                    上架:<input type="radio" name='status' value='1' id="user-weibo">
                    下架:<input type="radio" name='status' value='2' id="user-weibo">
                    <div>
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                    商品等级
                </label>
                <div class="am-u-sm-9">
                    普通商品:<input type="radio" name='level' value='0' id="user-weibo" checked>
                    会员商品:<input type="radio" name='level' value='1' id="user-weibo">
                    促销商品:<input type="radio" name='level' value='2' id="user-weibo">
                    <div>
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-email" class="am-u-sm-3 am-form-label">促销商品结束时间 </label>
                <div class="am-u-sm-9">
                    <input type="text" class="am-form-field tpl-form-no-bg" name="time" data-am-datepicker="" readonly="">
                    
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

@endsection

@section('js')
<script>
    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');
</script>



@endsection