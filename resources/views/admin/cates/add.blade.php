@extends('layout.admin')

@section('content')

	<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title  am-fl">
        　　　　　　　　　　　　　　　　　分类管理
        </div>                      
    </div>
    <div class="widget-body am-fr">
        <form action="/admin/cate" method='post' class="am-form tpl-form-border-form tpl-form-border-br"  enctype='multipart/form-data'>
            {{csrf_field()}}
            <div class="am-form-group">
                <label for="user-phone" class="am-u-sm-4 am-form-label">
                    顶级分类
                </label>
                <div class="am-u-sm-8">
                    <select data-am-selected="{searchBox: 1}" class="ad" name="pid" style="display: none;">
                        
                        <option value="0">顶级分类</option>
                        @foreach($res as $k=>$v)
                        <option value='{{$v->cid}}' add='{{$v->pid}}' class="zilei">{{$v->cname}}</option>
                        @endforeach             
                    </select>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-4 am-form-label">
                    添加分类
                </label>
                <div class="am-u-sm-8">
                    <input type="text" id="user-weibo" name="cname" placeholder="请添加分类用点号隔开">
                    <div>
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                    图片
                </label>
                <div class="am-u-sm-9">
                    <input type="file" name='cimg' multiple id="user-weibo" placeholder="">
                    
                   
                    
                    <div>
                    </div>
                </div>
            </div>
            <div class="am-form-group">
                <div class="am-u-sm-8 am-u-sm-push-4">
                        <input type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success " value="提交">
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')

<script>
        // var a = $('.images').val();

        // $('.ad').bind("change",function(){
        //     var b = $(this).attr('add');
            
        // })
        
</script>
@endsection