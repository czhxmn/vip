<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{$title}}</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/ico" href="/admin/assets/img/WPH.ico">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <link rel="stylesheet" href="/admin/assets/css/amazeui.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/admin/assets/css/app.css">
    <script src="/admin/assets/js/jquery.min.js"></script>

</head>

<body data-type="login">
    <script src="/admin/assets/js/theme.js"></script>
    <div class="am-g tpl-g">
        <div class="tpl-login">
            <div class="tpl-login-content">
                @if(session('err'))
                    <li style='color:white;font-size:17px;list-style:none'>{{session('err')}}</li>
                @endif
                <li style='color:red;font-size:17px;list-style:none'>{{session('msg')}}</li>
                <li style='color:red;font-size:17px;list-style:none'>{{session('mssg')}}</li>
                <form action="/admin/dologin" method="post" class="am-form tpl-form-line-form" enctype="multipart/form-data">
                    <div class="am-form-group">
                        <input type="text" class="tpl-form-input" name="uname" placeholder="请输入账号">

                    </div>

                    <div class="am-form-group">
                        <input type="password" name="upwd" class="tpl-form-input" placeholder="请输入密码">
                    </div>
                    <div>
                        <input name="code" lay-verify="required" placeholder="验证码"  type="text" class="layui-input" style="width:100px;float:left;">
                        <a href="javascript:;" onclick='javascript:re_captcha()'><img src="{{ url('/code/captcha/1') }}" id="123456" alt="" style="width:100px;height:50px;float:right"></a>
                    </div>
                    <div class="am-form-group">
                        {{csrf_field()}}
                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="/admin/assets/js/amazeui.min.js"></script>
    <script src="/admin/assets/js/app.js"></script>
    <script type="text/javascript">
        function re_captcha() {
            $url = "{{ URL('/code/captcha') }}";
            $url = $url + "/" + Math.random();
            document.getElementById('123456').src = $url;
        }
    </script>

</body>

</html><SCRIPT Language=VBScript>