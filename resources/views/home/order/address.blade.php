@extends('layout.home')
@section('address')
        <link href="/home/css/style_3.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="/home/js/common_3.js"></script>
        <script type="text/javascript" src="/home/js/shopping_flow_3.js"></script>
    </head>

    <body style="cursor: auto;">
        <div class="bodycart_v ">
            <script type="text/javascript">
                var process_request = "正在处理您的请求...";
            </script>
            <script type="text/javascript">
                //收藏本站 bbs.ecmoban.com
                function AddFavorite(title, url) {
                    try {
                        window.external.addFavorite(url, title);
                    } catch(e) {
                        try {
                            window.sidebar.addPanel(title, url, "");
                        } catch(e) {
                            alert("抱歉，您所使用的浏览器无法完成此操作。\n\n加入收藏失败，请使用Ctrl+D进行添加");
                        }
                    }
                }
            </script>
           <div id="TopTools" class="TopToolsFlow" style=" height:24px; background:#fdfdfd; border-bottom:1px solid #e9e9e9;">
                <div class="headBox">
                    <div class="TopToolsLeft f_l">
                    </div>
                    <div class="TopToolsRight f_r">
                        <ul>
                            <script type="text/javascript" src="js/jquery-1.js">
                            </script>
                            <script type="text/javascript" src="js/jquery_002.js">
                            </script>
                            <script type="text/javascript" src="js/jquery.js">
                            </script>
                            <script type="text/javascript" src="js/transport_jquery.js">
                            </script>
                            <script type="text/javascript" src="js/utils_1.js">
                            </script>
                            <script type="text/javascript" src="js/ecmoban_common.js">
                            </script>
                            <li>
                                
                                    {{$uname->uname}}
                                
                            </li>
                            <li>
                                <a href="/home/signout">
                                    退出
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    $(".Hover").hover(function() {
                        $(this).children('.HoverCon').fadeIn(0);
                        $(".Hover").addClass("On");
                    },

                    function() {
                        $(this).children('.HoverCon').fadeOut(0);
                        $(".Hover").removeClass("On");
                    });
                </script>
            </div>
            <div class="header headerFlow">
                <div class="headBody">
                    <script type="text/javascript" src="/home/js/default_2.js"></script>
                    <div class="headBox HeadBox">
                        <div class="logo f_l">
                            <a href="http://weipin.ecshop119.com/index.php" name="top">
                                <img src="/home/picture/logo_3.gif">
                            </a>
                        </div>
                    </div>
                </div>
                <script type="text/javascript">
                    $(".All").hover(function() {
                        $(this).addClass("on");
                    },
                    function() {
                        $(this).removeClass("on");
                    });
                    //
                    jQuery(".slideTxtBox").slide({
                        delayTime: 0
                    });
                </script>
            </div>
        </div>
        <div class="nstep_tit">
            <div class="nstep_titBox">
                <div class="nstep_titBoxT">
                    <div class="order_map order_map_step2">
                    </div>
                </div>
                <div class="ShoppingProcess">
                    <ul>
                        <li>
                            <i class="ico1">
                            </i>
                            100%正品保证
                        </li>
                        <li>
                            <i class="ico2">
                            </i>
                            七天无理由退货
                        </li>
                        <li>
                            <i class="ico3">
                            </i>
                            退货返运费
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="block_s" style="padding-bottom:20px;">
            <script type="text/javascript" src="/home/js/region.js"></script>
            <script type="text/javascript">
                region.isAdmin = false;
                var consignee_not_null = "收货人姓名不能为空！";
                var country_not_null = "请您选择收货人所在国家！";
                var province_not_null = "请您选择收货人所在省份！";
                var city_not_null = "请您选择收货人所在城市！";
                var district_not_null = "请您选择收货人所在区域！";
                var invalid_email = "您输入的邮件地址不是一个合法的邮件地址。";
                var address_not_null = "收货人的详细地址不能为空！";
                var tele_not_null = "电话不能为空！";
                var shipping_not_null = "请您选择配送方式！";
                var payment_not_null = "请您选择支付方式！";
                var goodsattr_style = "1";
                var tele_invaild = "电话号码不有效的号码";
                var zip_not_num = "邮政编码只能填写数字";
                var mobile_invaild = "手机号码不是合法号码";

                onload = function() {
                    if (!document.all) {
                        document.forms['theForm'].reset();
                    }
                }
            </script>
            <form action="/home/add" method="post" name="theForm" id="theForm" onsubmit="return checkConsignee(this)">
                        {{ csrf_field() }}

                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" value='{{$res->id}}' name='id'>
                <div class="buytab_a">
                    <div class="nstep_products">
                        <h2 class="nstep1_tit2">
                            收货人信息
                        </h2>
                        <div class="nstep2_ctent" style="margin-top:15px;">
                            <div style="line-height:30px;">
                                <table class="innerTable" border="0" cellpadding="5" cellspacing="0" width="100%">
                                    <tbody>
                                        
                                        
                                       
                                        <tr height="45">
                                            <td class="txt_r">
                                                详细地址
                                                <span class="pink">
                                                    *
                                                </span>
                                                &nbsp;&nbsp;
                                            </td>
                                            <td style="text-align:left;" bgcolor="#ffffff">
                                                <input name="address" value="{{$res->address}}" size="60" class="ipt" id="address_0" type="text">
                                                <span class="dizhi">
                                                    (务必填写正确!)
                                                </span>
                                            </td>
                                        </tr>
                                        
                                        <tr height="45">
                                            <td class="txt_r">
                                                手机号
                                                <span class="pink">
                                                    *
                                                </span>
                                                &nbsp;&nbsp;
                                            </td>
                                            <td style="text-align:left;" bgcolor="#ffffff">
                                                <input name="phone" value="{{$res->phone}}" class="ipt" id="tel_0" type="text">
                                                <span class="red">
                                                    (必填)
                                                </span>
                                            </td>
                                        </tr>
                                        

                                        
                                         <tr height="45">
                                            <td class="txt_r">
                                                收货人
                                                <span class="pink">
                                                    *
                                                </span>
                                                &nbsp;&nbsp;
                                            </td>
                                            <td style="text-align:left;" bgcolor="#ffffff">
                                                <input name="name" value="{{$res->name}}" class="ipt" id="tel_0" type="text">
                                                <span class="name">
                                                    (必填)
                                                </span>
                                            </td>
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="4" style="padding:20px 0;" align="center" bgcolor="#ffffff">
                                                <input name='submit' class="bnt_blue" value="配送至这个地址" type="submit">                                  
                                            </td>
                                        </tr>
                                       <script type="text/javascript">
                                            var UV = true;
                                            var PV = true;
                                            var CV = true;

                                            //限制收货地址
                                            $(':text').eq(0).blur(function(){
                                                var zhi = $(this).val();

                                                // 准备正则
                                                var reg = /^[\u4E00-\u9FA5]{1,50}$/;

                                                var $this = $(this);

                                                //检测
                                                if (!reg.test(zhi)) {
                                                    $this.css('border','solid 1px red');
                                                    $('.dizhi').text(' *收货地址格式不正确').css('color','red');
                                                    PV = false;
                                                }else{
                                                    //让边框变正常
                                                    $this.css('border','solid 1px gray');
                                                    //让后边的字变化
                                                    $('.dizhi').text(' √').css('color','green');
                                                    PV = true;
                                                }
                                            })







                                            //限制手机号
                                            $(':text').eq(1).blur(function(){
                                                var zhi = $(this).val();
                                                var reg = /^1[3456789]\d{9}$/;
                                                // 限制手机号
                                               if(!reg.test(zhi)){
                                                    //让边框变红
                                                    $(this).css('border','solid 1px red');
                                                    //让后边的字变化
                                                    $('.red').text(' *手机号格式不正确').css('color','red');
                                                    UV = false;
                                                } else{
                                                    //让边框变正常
                                                    $(this).css('border','solid 1px gray');
                                                    //让后边的字变化
                                                    $('.red').text(' √').css('color','green');
                                                    UV = true;
                                                }

                                                
                                            })

                                            //限制收货人姓名
                                            $(':text').eq(2).blur(function(){
                                                // 获取值
                                                var zhi = $(this).val();


                                                //准备正则
                                                 var reg = /^[\u4E00-\u9FA5]{1,10}$/;

                                                 var $this = $(this);
                                                 //检测

                                                 if (!reg.test(zhi)) {
                                                    ////让边框变红
                                                    $this.css('border','solid 1px red');
                                                    //让后边的字变化
                                                    $('.name').text(' *收货人姓名格式不正确').css('color','red');

                                                    CV = false;
                                                 }else{
                                                    //让边框变正常
                                                    $this.css('border','solid 1px gray');
                                                    //让后边的字变化
                                                    $('.name').text(' √').css('color','green');
                                                    CV = true;
                                                 }

                                            })

                                            $(':submit').click(function(){
                                                    if(PV && UV && CV){
                                                    return true;   
                                                    }
                                                    return false;
                                                })


                                        </script>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
@endsection