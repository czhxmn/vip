<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>用户登录</title>

<link rel="shortcut icon" href="favicon.ico" />
<link rel="icon" type="image/ico" href="/admin/assets/img/WPH.ico">
<link href="css/style_3.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="js/common.js"></script><script type="text/javascript" src="js/user.js"></script><script type="text/javascript" src="js/transport_jquery.js"></script><script type="text/javascript" src="js/jquery.min.js"></script>
<body style="background:#fdfbfe;">
<div class="body_user ">

<div class="header">
	<div class="headBody">
		<div class="headBox HeadBox" style="padding-top:40px;">
			<div class="logo f_l"><a href="index.php" name="top"><img src="picture/logo.gif" /></a></div>
            <div class="bannerHeader f_r"></div>
		</div>
	</div>
</div></div>
<div class="content" style="padding-top:30px;">
<div class="contentLogin" style="border:0;">
<div class="content_login">

<div class="coLoginBody_left"><a href='/home/index'
					target='_blank'><img src='picture/1403227386901871933.jpg' width='542' height='309'
					border='0' /></a>

</div>
<div class="coLoginBody_right" style="margin-top:20px;">
	<div class="coLogin_title">欢迎回来！请登录</div>
	<div class="coLogin_box_right">
        {{csrf_field()}}
    	<form name="formLogin" action="/home/dologin" method="get" enctype="multipart/form-data">
            @if(session('err'))
                <li style='color:red;font-size:17px;list-style:none'>{{session('err')}}</li>
            @endif
    		<div class="coLogin_one">
            	<div class="coLogin_txt_all">
            		<input name="uname" id="xs_username" type="text" size="17" class="coLogin_txt"/><label>用户名</label><p>&nbsp;</p>
                </div>
            </div>
        	<div class="coLogin_one">
            	<div class="coLogin_txt_all">
                	<input name="upwd" id="xs_password" type="password" size="17" class="coLogin_txt" /><label>密码</label><p>&nbsp;</p>
                </div>
            </div>


        	<div class="coLogin_one">

            	<button type="submit" class="smLogin_btn" />登录</botton>
        	</div>

			<div class="coLogin_two">
            	</span><a href="signup" style="color:#336699;">免费注册</a></span>
        	</div>
    	</form>
	</div>
</div>











<script type="text/javascript">
	$(function(){
		var oInput=$(".coLogin_txt");
		var text=$(".coLogin_txt_all label");
		text.click(function(){
			$(this).siblings(oInput).focus();
		});
		oInput.focus(function(){
			$(this).siblings("label").hide();
		});
		oInput.blur(function(){
			if($(this).val()==""){
				$(this).siblings("label").show();
			}
		});
	});
    
</script>


</div>
</div>
</div>
<div class="blank5"></div>
<div class="flow">
<div class="footer">
<div class="footerBody"><div style="background:#fdfbfe; padding-bottom:40px;">
	<div style="width:1000px; text-align:center; line-height:24px;">
  <p>Copyright © 2008-2018 ecshop.com，All Rights Reserved 粤ICP备xxxxx号-1 许可证：粤B2-88888999 使用本网站即表示接受ECSHOP模板屋用户协议。</p>
  <p class="lightGrey">
版权所有 ECSHOP模板屋www.ecshop119.com
</p>

    </div>
</div></Div>
</div>
</div>
</div>
</body>
<script type="text/javascript">
var process_request = "正在处理您的请求...";
var username_empty = "- 用户名不能为空。";
var username_shorter = "- 用户名长度不能少于 3 个字符。";
var username_invalid = "- 用户名只能是由字母数字以及下划线组成。";
var password_empty = "- 登录密码不能为空。";
var password_shorter = "- 登录密码不能少于 6 个字符。";
var confirm_password_invalid = "- 两次输入密码不一致";
var email_empty = "- Email 为空";
var email_invalid = "- Email 不是合法的地址";
var agreement = "- 您没有接受协议";
var msn_invalid = "- msn地址不是一个有效的邮件地址";
var qq_invalid = "- QQ号码不是一个有效的号码";
var home_phone_invalid = "- 家庭电话不是一个有效号码";
var office_phone_invalid = "- 办公电话不是一个有效号码";
var mobile_phone_invalid = "- 手机号码不是一个有效号码";
var msg_un_blank = "* 用户名不能为空";
var msg_un_length = "* 用户名最长不得超过7个汉字";
var msg_un_format = "* 用户名含有非法字符";
var msg_un_registered = "* 用户名已经存在,请重新输入";
var msg_can_rg = "* 可以注册";
var msg_email_blank = "* 邮件地址不能为空";
var msg_email_registered = "* 邮箱已存在,请重新输入";
var msg_email_format = "* 邮件地址不合法";
var msg_blank = "不能为空";
var no_select_question = "- 您没有完成密码提示问题的操作";
var passwd_balnk = "- 密码中不能包含空格";
var username_exist = "用户名 %s 已经存在";

</script>
</html>
