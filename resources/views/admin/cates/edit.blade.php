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
        <form action="/admin/cate/{{$info->cid}}" method='post' class="am-form tpl-form-line-form">


            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">分类名</label>
                        <div class="am-u-sm-9">
                            <input type="text" name='cname' class="small" value='{{$info->cname}}'>
                        </div>
                
            </div>
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">顶级分类</label>
                        <div class="am-u-sm-8">
                            <select data-am-selected="{searchBox: 1}" name="pid" style="display: none;">
                                <option value="0">顶级分类</option>
                                @foreach($res as $k=>$v)
                                <option value='{{$v->cid}}' @if($info->pid == $v->cid)  selected @endif>{{$v->cname}}</option>
                                @endforeach             
                            </select>
                        </div>
                <div class="am-u-sm-9">
                   
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

@endsection

@section('js')
<script>

    $('.mws-form-message').delay(3000).slideUp(1000);

</script>

@endsection