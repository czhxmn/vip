@extends('layout.admin')
@section('title',$title)

@section('content')

    <div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">
            链接修改
        </div>
        <div class="widget-function am-fr">
            <a href="javascript:;" class="am-icon-cog">
            </a>
        </div>
    </div>
    <div class="widget-body am-fr">
        <form class="am-form tpl-form-line-form" action='/admin/links/{{$res->id}}' method="post" enctype="multipart/form-data">
            @if (count($errors) > 0)
            <div class="am-form-group" id='ddd'>
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    
                    <div class="mws-form-message error">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li style='color:red;font-size:17px;list-style:none'>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    
                    
                </label>
                
            </div>
            @endif
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    标题
                    <span class="tpl-form-line-small-title">
                        linkname
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" class="tpl-form-input" name='linkname' id="user-name" value="{{$res->linkname}}">
                    <small>
                        请填写链接标题
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    URL
                    <span class="tpl-form-line-small-title">
                        url
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" class="tpl-form-input" name='url' id="user-name" value='{{$res->url}}'>
                    <small>
                        请填写链接地址
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-weibo" class="am-u-sm-3 am-form-label">
                    图片
                    <span class="tpl-form-line-small-title">
                        logo
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <img src="{{$res->logo}}" alt="" width='147px' height='27px'>
                    <input type="file" name='logo' id="user-weibo" placeholder="链接图片">
                    <div>
                    </div>
                </div>
            </div>
            
            <div class="am-form-group">
                <label for="user-intro" class="am-u-sm-3 am-form-label">
                    链接详情
                </label>
                <div class="am-u-sm-9">
                    <textarea class="" rows="10" id="user-intro" name='ltext'>{{$res->ltext}}
                    </textarea>
                </div>
            </div>
            <div class="am-form-group">
                <label class="am-u-sm-3 am-form-label" for="user-intro">状态</label>
                <div class="am-u-sm-9">
                    <div class="tpl-switch">
                        <li><input type="radio" name='status' value='1' @if($res->status == 1) checked @endif> <label>启用</label></li>
                            <li><input type="radio" name='status' value='0'@if($res->status == 0) checked @endif> <label>禁止</label></li>
                    </div>

                </div>
            </div>
            <div class="am-form-group">
                {{method_field('PUT')}}

                {{csrf_field()}}
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                        提交
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if(!empty(session()->get('msg')))
    <script>
        
        alert({{session()->get('msg')}});

       

    </script>
    @endif
@endsection

@section('js')
    <script>
    
    $('#ddd').delay(3000).slideUp(1000);

</script>
@endsection