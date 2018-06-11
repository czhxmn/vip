@extends('layout.admin')
@section('title',$title)
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
    <div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">
            
        </div>
        
    </div>

    <div class="widget-body am-fr">
        
        <form class="am-form tpl-form-line-form" action="/admin/user" method="post">
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
                    <input type="text" class="tpl-form-input" id="user-name" name='uname' placeholder="请输入名字">
                    <small>
                        请填写名字6-12字符左右。
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    昵称
                    <span class="tpl-form-line-small-title">
                        NickName
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="text" class="tpl-form-input" id="user-name" name='nickName' placeholder="请输入昵称">
                    <small>
                        请填写昵称4-12字符左右。
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    密码
                    <span class="tpl-form-line-small-title">
                        PassWord
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="password" class="tpl-form-input" id="user-name" name='upwd' placeholder="请输入密码">
                    <small>
                        请填写6-12个字符左右。
                    </small>
                </div>
            </div>
            <div class="am-form-group">
                <label for="user-name" class="am-u-sm-3 am-form-label">
                    确认密码
                    <span class="tpl-form-line-small-title">
                        RepassWord
                    </span>
                </label>
                <div class="am-u-sm-9">
                    <input type="password" class="tpl-form-input" id="user-name" name='repass' placeholder="请确认密码">
                    <small>
                        请与密码一致。
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
                    <input type="email" class="tpl-form-input" id="user-name" ' placeholder="请输入邮箱" name='email'>
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
                    <select data-am-selected="{searchBox: 1}" style="display: none;">
                        <option value="1">
                            女
                        </option>
                        <option value="2">
                            男
                        </option>
                        <option value="0">
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
                    <input type="text" name='phone' placeholder="输入手机号">
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
                        <option value="1">
                            超级管理员
                        </option>
                        <option value="2">
                            管理员
                        </option>
                        <option value="3">
                            VIP
                        </option>
                        <option value="4">
                            用户
                        </option>
                    </select>
                </div>
            
            
            
            <div class="am-form-group">
                <label class="am-u-sm-3 am-form-label" for="user-intro">状态</label>
                <div class="am-u-sm-9">
                    <div class="tpl-switch">
                        <li><input type="radio" name='status' value='1' checked> <label>启用</label></li>
                            <li><input type="radio" name='status' value='0'> <label>禁止</label></li>
                    </div>

                </div>
            </div>
            <div class="am-form-group">
                {{csrf_field()}}
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
    // $.ajaxSetup({headers:{
    //                     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //                 }
    //             });
    //失去焦点 获取值
    $('#user-name').blur(function(){
        var uname = $(this).val();

        //发送ajax验证m
        $.get('/admin/unajax',{uname:uname},function(data){
            if(data == 1){
                $('#user-name').next().text('用户名已存在').css('color','red');
            } else {
                $('#user-name').next().text('请填写名字6-12字符左右。').css('color','white');

            }
        })

    })
    $('#ddd').delay(3000).slideUp(1000);

</script>
@endsection