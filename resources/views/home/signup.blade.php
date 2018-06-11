<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
<title>{{$title}}</title>
<link rel="shortcut icon" href="favicon.ico" />
<link href="css/style_4.css" rel="stylesheet" type="text/css" />
<link rel="icon" type="image/ico" href="/admin/assets/img/WPH.ico">

<script type="text/javascript" src="js/common.js"></script>
<script type="text/javascript" src="js/user.js"></script>
<script type="text/javascript" src="js/transport_jquery.js"></script>
<script type="text/javascript" src="js/jquery.min.js"></script>
</head>
<body style="background:#fdfbfe;">
    <div class="body_user ">
        <div class="header">
        	<div class="headBody">
        		<div class="headBox HeadBox" style="padding-top:40px;">
        			<div class="logo f_l">
                        <a href="index.php" name="top">
                            <img src="picture/logo.gif" />
                        </a>
                    </div>
                    <div class="bannerHeader f_r"></div>
        		</div>
        	</div>
        </div>
    </div>
    <div class="content" style="padding-top:30px;">
        <div class="contentLogin" style="border:0;">
            <div class="content_login">
                <script type="text/javascript" src="js/utils.js"></script>
                <div class="coLoginBody_left">
                    <a href='affiche.php?ad_id=113&amp;uri=http%3A%2F%2Fwww.ecshop119.com' target='_blank'>
                        <img src='picture/1403227386901871933.jpg' width='542' height='309' border='0' />
                    </a>
                </div>
                <div class="coLoginBody_right">
                	<div class="coLogin_title">不是唯品会会员？请注册
                        <span style=" height:16px; border-right:1px solid #bfbdbf; padding-left:12px; display:inline-block; vertical-align:top;"></span>
                        <span class="f_r" style="font-size:12px;">已注册？<a href="login">登录</a></span>
                    </div>
                    <div class="coLogin_box_right">
                    @if(count($errors)>0)
                        @if(is_object($errors))
                            @foreach($errors->all() as $error)
                            <li style='color:red;font-size:17px;list-style:none'>{{ $error }}</li>
                            @endforeach
                        @endif
                    @endif
                    <li style='color:red;font-size:17px;list-style:none'>{{session('msg')}}</li>
                    	<form action="/home/dosignup" method="get" enctype="multipart/form-data">
                            <div class="coLogin_one">
                				<div class="coLoginTxt">
                					<div class="coLogin_txt_all">
                                        <input name="uname" type="text" size="17" id="username" class="coLogin_txt"/>
                                        <label>用户名</label>
                                    </div>
                				</div>
                                <span id="username_notice" style="color:#FF0000; padding:0 0 0 5px;">&nbsp;</span>
                			</div>
                            <div class="coLogin_one">
                                <div class="coLoginTxt">
                                    <div class="coLogin_txt_all">
                                        <input name="upwd" type="password" id="password1" class="coLogin_txt" />
                                        <label>密码</label>
                                    </div>
                                </div>
                                <span style="color:#FF0000; padding:0 0 0 5px;" id="password_notice">&nbsp;</span>
                            </div>
                            <div class="coLogin_one">
                                <div class="coLoginTxt">
                                    <div class="coLogin_txt_all">
                                        <input name="reupwd" type="password" id="conform_password" class="coLogin_txt"/>
                                        <label>确认密码</label>
                                    </div>
                                </div>
                                <span style="color:#FF0000; padding:0 0 0 5px;" id="conform_password_notice">&nbsp;</span>
                            </div>
                            <div class="coLogin_one">
                                <div class="coLoginTxt">
                                    <div class="coLogin_txt_all">
                                        <input name="phone" type="text" size="17" id="email" class="coLogin_txt"/>
                                        <label>手机号</label>
                                    </div>
                                </div>
                                <span id="email_notice" style="color:#FF0000; padding:0 0 0 5px;">&nbsp;</span>
                            </div>
                            <div class="coLogin_one">
                                <div class="coLoginTxt">
                                    <div class="coLogin_txt_all">
                                        <input name="email" type="text" size="17" id="email" class="coLogin_txt"/>
                                        <label>E-mail</label>
                                    </div>
                                </div>
                                <span id="email_notice" style="color:#FF0000; padding:0 0 0 5px;">&nbsp;</span>
                            </div>
                            <div class="coLogin_one">
                            	<div class="coLoginTxt_2">
                            		<div class="coLogin_txt_all">
                                        <input type="text" size="8" name="captcha" class="coLogin_txt" style="width:100px; float:left; display:inline; margin-right:10px;" />
                                        <label>验证码</label>
                                    </div>
                            		<div class="coLoginTxt_2_img">
                                        <img src="/home/captcha" alt="captcha" onclick="this.src=this.src+='?1'" width="100" height="40" />
                                    </div>
                				</div>
                            </div>
                            <div class="coLogin_two">
                            	<p>&nbsp;</p>
                                {{csrf_field()}}
                                <button type="submit" class="biLogin_btn2">注册</button>
                            </div>
                            <div class="coLogin_one" style="display:none;">
                            	<p></p>
                            	<a href="login">我已有账号，我要登录</a>&nbsp;&nbsp;&nbsp;
                                <a href="forget">您忘记密码了吗？</a>
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
            <div class="footerBody">
                <div style="background:#fdfbfe; padding-bottom:40px;">
        	       <div style="width:1000px; text-align:center; line-height:24px;">
                        <p>
                            Copyright © 2008-2018 ecshop.com，All Rights Reserved 粤ICP备xxxxx号-1 许可证：粤B2-88888999 使用本网站即表示接受ECSHOP模板屋用户协议。
                        </p>
                        <p class="lightGrey">
                            版权所有 ECSHOP模板屋www.ecshop119.com
                        </p>
                    </div>
                </div>
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
