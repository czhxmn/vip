@extends('layout.admin')

@section('content')

    <div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">
            
        </div>
        
    </div>

    <div class="widget-body am-fr">
        
        <form class="am-form tpl-form-line-form" action="/admin/user/{{$res->uid}}" method="post">
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
                    名字
                    <span class="tpl-form-line-small-title">
                        uname
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" class="tpl-form-input" id="user-name" name='uname' value="{{$res->uname}}">
                    <small>
                        请填写名字6-12字符左右。
                    </small>
                </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    昵称
                    <span class="tpl-form-line-small-title">
                        NickName
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" class="tpl-form-input" id="user-name" name='nickName' value="{{$res->nickName}}">
                    <small>
                        请填写昵称4-12字符左右。
                    </small>
                </div>
            </div>
           
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    邮箱
                    <span class="tpl-form-line-small-title">
                        email
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="email" class="tpl-form-input" id="user-name" ' value="{{$res->email}}" name='email'>
                    <small>
                        例:123456@qq.com
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-phone" class="am-u-sm-3 am-form-label">
                    性别
                    <span class="tpl-form-line-small-title">
                        sex
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <select data-am-selected="{searchBox: 1}" style="display: none;" name='sex'>
                        <option value="1" @if($res->sex == 1) selected @endif>
                            女
                        </option>
                        <option value="2" @if($res->sex == 2) selected @endif>
                            男
                        </option>
                        <option value="0" @if($res->sex == 0) selected @endif>
                            保密
                        </option>
                    </select>
                </div>
            </div>
            <div class="am-form-group">
                <label class="am-u-sm-3 am-form-label">
                    电话号码
                    <span class="tpl-form-line-small-title">
                        Phone
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" name='phone' value="{{$res->phone}}">
                </div>
            </div>
            
             <div class="am-form-group">
                <label for="user-phone" class="am-u-sm-3 am-form-label">
                    权限
                    <span class="tpl-form-line-small-title">
                        auth
                    </span>
                </label>

                <div class="am-u-sm-9">
                    <select data-am-selected="{searchBox: 1}" style="display: none;" name='auth'>
                        <option value="1" @if($res->auth == 1) selected @endif>
                            超级管理员
                        </option>
                        <option value="2" @if($res->auth == 2) selected @endif>
                            管理员
                        </option>
                        <option value="3" @if($res->auth == 3) selected @endif>
                            VIP
                        </option>
                        <option value="4" @if($res->auth == 4) selected @endif>
                            用户
                        </option>
                    </select>
                </div>
            
            
            
            <div class="am-form-group">
                <label class="am-u-sm-3 am-form-label" for="user-intro">状态</label>
                <div class="am-u-sm-9">
                    <div class="tpl-switch">
                        <li><input type="radio" name='status' value='1' @if($res->status == 1) checked @endif> <label>启用</label></li>
                            <li><input type="radio" name='status' value='0' @if($res->status == 0) checked @endif> <label>禁止</label></li>
                    </div>

                </div>
            </div>
            <div class="am-form-group">
                {{method_field('PUT')}}
                {{csrf_field()}}
                <div class="am-u-sm-9 am-u-sm-push-3">
                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">
                        修改
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection

@section('js')
    <script>
    
    $('#ddd').delay(3000).slideUp(1000);

</script>
@endsection