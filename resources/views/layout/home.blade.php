<!DOCTYPE html>
<html>

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>
            唯品会
        </title>
        <link rel="icon" type="image/ico" href="/admin/assets/img/WPH.ico">

        <link rel="icon" href="animated_favicon.gif" type="image/gif" />
@section('address')
        <link href="/home/css/style.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/home/js/common.js"></script>
        <script type="text/javascript" src="/home/js/index.js"></script>
    </head>

    <body>
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
        <div id="TopTools">
            <div class="headBox">
                <div class="TopToolsLeft f_l">
                </div>
                <div class="TopToolsRight f_r">
                    <ul>
                        <script type="text/javascript" src="/home/js/jquery-1.9.1.min.js"></script>
                        <script type="text/javascript" src="/home/js/jquery.json.js"></script>
                        <script type="text/javascript" src="/home/js/jquery.superslide.js"></script>
                        <script type="text/javascript" src="/home/js/transport_jquery.js"></script>
                        <script type="text/javascript" src="/home/js/utils.js"></script>
                        <script type="text/javascript" src="/home/js/ecmoban_common.js"></script>
                        @section('js')
                        @show
                        @if(session('uid'))
                            <li>
                                <span class="f9">
                                    欢迎 {{$uname->uname}} &nbsp;&nbsp;
                                </span>
                            </li>
                            <li>
                                <a href="/home/gerenxinxi">
                                    <span class="f9">
                                        个人中心
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/home/signout">
                                    <span class="f9">
                                        退出
                                    </span>
                                </a>
                            </li>
                        @else
                            <li>
                                <a href="/home/login">
                                    <span class="f9">
                                        登陆
                                    </span>
                                </a>
                            </li>
                            <li>
                                <a href="/home/signup">
                                    <span class="f9">
                                        注册
                                    </span>
                                </a>
                            </li>
                        @endif
                        <li>
                            <a href="/home/carts">
                                购物袋
                            </a>
                        </li>
                        <li>
                            <a href="/home/myorder">
                                我的订单
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
@section('gouwu')
        <div class="header">
            <div class="headBody">
                <script type="text/javascript" src="/home/js/default.js"></script>
                <div class="headBox HeadBox">
                    <div class="logo f_l">
                        <a href="/home/index" name="top">
                            <img src="/home/picture/logo.gif" />
                        </a>
                    </div>
                    <div class="HeadRight f_r">
                        <div class="CatBox f_r">
                            <div class="Cat f_l" id="ECS_CARTINFO">
                                <div class="Cart shop_txt">
                                    <div class="CartTit">
                                        <a class="header_cart_title" href="/home/carts">
                                            特卖会购物袋
                                        </a>
                                        
                                    </div>
                                    
                                </div>
                                <script type="text/javascript">
                                    function deleteCartGoods(rec_id) {
                                        Ajax.call('delete_cart_goods.php', 'id=' + rec_id, deleteCartGoodsResponse, 'POST', 'JSON');
                                    }


                                    function deleteCartGoodsResponse(res) {
                                        if (res.error) {
                                            alert(res.err_msg);
                                        } else {
                                            $("#ECS_CARTINFO").html(res.content);
                                        }
                                    }

                                    $(function() {
                                        $("#ECS_CARTINFO li.shopWhite").mouseenter(function() {
                                            $(this).removeClass("shopWhite");
                                            $(this).addClass("shopGray");
                                        });

                                        $("#ECS_CARTINFO li.shopWhite").mouseleave(function() {
                                            $(this).removeClass("shopGray");
                                            $(this).addClass("shopWhite");
                                        });
                                    })
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="HeadNavBox">
                    <div class="headNav">
                        <div class="LeftNav">
                            <div id="wed-service" class="All">
                                <div id="web-service-title" class="AllTitle">
                                    <span>
                                        在售商品分类
                                    </span>
                                </div>
                                <div id="service-list" class="slideTxtBox AllCon">
                                    <ul class="hd hcl_class">
                                     @foreach($pids as $k=>$v)
                                    <li>
                                        <div class="hlc_icon hlc_class1">
                                            <a href="/home/list/{{$v->cid}}">
                                                {{$v->cname}}  
                                            </a>
                                        </div>    
                                    </li>
                                    @endforeach
                                    </ul>
                                    <div class="bd hcl_con">
                                        @foreach($ids as $kk=>$vv)
                                        <div class="J_hlc_row">
                                            <dl>
                                             @foreach($vv->sub as $key=>$value)
                                                <a href="/home/list/{{$value->cid}}">
                                                {{$value->cname}}
                                                    
                                                </a>
                                            @endforeach
                                            </dl>
                                        </div>
                                       @endforeach
                                    </div>
                                </div>
                            </div>
                            <div class="subNav">
                                <ul>
                                    <li class="current">
                                        <a href="/home/index">
                                            首页
                                        </a>
                                    </li>
                                    
                                    <li>
                                        <a href="/home/list/{{64}}">
                                            <span class="beauty_icon">
                                                家用电器
                                            </span>
                                        </a>
                                    </li>
                                  
                                    <li>
                                        <a href="/home/cuxiao/{{2}}">
                                            <span class="beauty_icon">
                                               促销商品
                                            </span>
                                        </a>
                                    </li>
                                   
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="FloatNav" id="inner">
                    <div class="FloatNavBj">
                    </div>
                    <div class="FloatNavCon">
                        <a href="./" class="fsc_icon">
                        </a>
                        <ul class="fsc_nav">
                            <li class="on">
                                <a href="/home/index">
                                    首页
                                </a>
                            </li>
                            <li>
                                <a href="/home/list/{{1}}">
                                    家用电器
                                </a>
                            </li>
                            <li>
                                <a href="/home/cuxiao/{{2}}">
                                    促销商品
                                </a>
                            </li>
                        </ul>
                        <div class="fsc_cart">
                            <div class="fsc_cart_con">
                                <a href="#" class="fsc_cart_title">
                                    购物袋
                                </a>
                               
                            </div>
                            <div class="fsc_cart_list">
                            </div>
                        </div>
                        <div class="fsc_class">
                            <div class="fsc_class_tit">
                                在售商品分类
                                
                            </div>
                            <div class="fsc_class_con slideTxtBox"> 
                                <ul class="hd hcl_class">
                                     @foreach($pids as $k=>$v)
                                    <li>
                                        <div class="hlc_icon hlc_class1">
                                            <a href="/home/list/{{$v->cid}}">
                                            {{$v->cname}}  
                                            </a>
                                        </div>    
                                    </li>
                                    @endforeach
                                </ul>
                                <div class="bd hcl_con">
                                    @foreach($ids as $kk=>$vv)
                                    <div class="J_hlc_row">
                                        <dl>
                                        @foreach($vv->sub as $key=>$value)
                                            <a href="/home/list/{{$value->cid}}">
                                            {{$value->cname}}
                                                
                                            </a>
                                        @endforeach
                                        </dl>
                                    </div>
                                   @endforeach  
                                </div>
                                <script type="text/javascript">
                                    $(".fsc_class").hover(function() {
                                        $(this).addClass("on");
                                    },
                                    function() {
                                        $(this).removeClass("on");
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script type="text/javascript">
                var obj11 = document.getElementById("inner");
                var top11 = getTop(obj11);
                var isIE6 = /msie 6/i.test(navigator.userAgent);
                $("#inner").css({
                    "position": "fixed",
                    "top": -45 + "px"
                });
                window.onscroll = function() {
                    var bodyScrollTop = document.documentElement.scrollTop || document.body.scrollTop;
                    if (bodyScrollTop > top11) {
                        obj11.style.position = (isIE6) ? "absolute": "fixed";
                        obj11.style.top = (isIE6) ? bodyScrollTop + "px": "0px";
                        $("#inner").stop(true, false).animate({
                            "top": 0
                        },
                        300);
                    } else {
                        obj11.style.position = "fixed";
                        $("#inner").stop(true, false).animate({
                            "top": -45 + "px"
                        },
                        300);
                    }
                }
                function getTop(e) {
                    var offset = e.offsetTop;
                    if (e.offsetParent != null) offset += getTop(e.offsetParent);
                    return offset;
                }
            </script>
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
        <!-- 内容     -->
@section('content')
@show

@show

@show
        <!-- 页脚 -->
        <div class="footer">
            <div class="footerBody">
                <div class="footTopBox">
                    <div class="footTop">
                        <dl>
                            <dt class="Help01">
                                服务保障
                            </dt>
                            <dd>
                                <p>
                                    <a href="article.php?id=79" title="正品保证">
                                        正品保证
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=80" title="7天无理由退货">
                                        7天无理由退货
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=81" title="退货返运费">
                                        退货返运费
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=82" title="7x15小时客户服务">
                                        7x15小时客户服务
                                    </a>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="Help02">
                                购物指南
                            </dt>
                            <dd>
                                <p>
                                    <a href="article.php?id=83" title="导购演示">
                                        导购演示
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=84" title="订单操作">
                                        订单操作
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=85" title="会员注册">
                                        会员注册
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=86" title="账户管理">
                                        账户管理
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=87" title="收货样品">
                                        收货样品
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=88" title="会员等级">
                                        会员等级
                                    </a>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="Help03">
                                支付方式
                            </dt>
                            <dd>
                                <p>
                                    <a href="article.php?id=89" title="23家主流网银支付">
                                        23家主流网银支付
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=90" title="货到付款">
                                        货到付款
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=91" title="支付宝、银联等支付">
                                        支付宝、银联等支付
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=92" title="信用卡支付">
                                        信用卡支付
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=93" title="唯品钱包支付">
                                        唯品钱包支付
                                    </a>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="Help04">
                                配送方式
                            </dt>
                            <dd>
                                <p>
                                    <a href="article.php?id=94" title="全场满288元免运费">
                                        全场满288元免运费
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=95" title="配送范围及运费">
                                        配送范围及运费
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=96" title="验货与签收">
                                        验货与签收
                                    </a>
                                </p>
                            </dd>
                        </dl>
                        <dl>
                            <dt class="Help05">
                                售后服务
                            </dt>
                            <dd>
                                <p>
                                    <a href="article.php?id=97" title="退货政策">
                                        退货政策
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=98" title="退货流程">
                                        退货流程
                                    </a>
                                </p>
                                <p>
                                    <a href="article.php?id=99" title="退款方式和时效">
                                        退款方式和时效
                                    </a>
                                </p>
                            </dd>
                        </dl>
                        <dl class="f_client">
                            <dt class="Help06">
                                唯品会客户端二维码
                            </dt>
                            <dd class="qr">
                                <img src="/home/picture/qr-app.png" alt="">
                            </dd>
                            <dd>
                                下载唯品会移动客户端
                            </dd>
                        </dl>
                        <dl class="f_client">
                            <dt class="Help07">
                                用微信扫一扫
                            </dt>
                            <dd class="qr">
                                <img src="/home/picture/qr-weixin.png" alt="">
                            </dd>
                            <dd>
                                <a href="#">
                                    订阅唯品会官方微信
                                </a>
                            </dd>
                        </dl>
                    </div>
                    <script type="text/javascript">
                        $(".footTop dl:last").css({
                            "border": "0"
                        });
                    </script>
                </div>
                <div class="BottomNav">
                    <div class="BottomNavBox">
                        <a href="article.php?id=79">
                            正品保证
                        </a>
                        <span>
                            |
                        </span>
                        <a href="article.php?id=85">
                            会员注册
                        </a>
                        <span>
                            |
                        </span>
                        <a href="article.php?id=87">
                            收货样品
                        </a>
                        <span>
                            |
                        </span>
                        <a href="article.php?id=83">
                            导购演示
                        </a>
                        <span>
                            |
                        </span>
                        <a href="article.php?id=86">
                            账户管理
                        </a>
                        <span>
                            |
                        </span>
                        <a href="article.php?id=90">
                            货到付款
                        </a>
                        <span>
                            |
                        </span>
                        <a href="article.php?id=97">
                            退货政策
                        </a>
                        <span>
                            |
                        </span>
                        <a href="article.php?id=98">
                            退货流程
                        </a>
                        <span>
                            |
                        </span>
                    </div>
                    <script type="text/javascript">
                        $(".BottomNavBox span:last").css("display", "none");
                    </script>
                </div>
                <div class="footer_txt">
                    <p>
                        Copyright © 2008-2016 ECSHOP119.COM，All Rights Reserved 粤ICP备08114786号-1
                        许可证：粤B2-20080329 使用本网站即表示接受唯品会用户协议。
                    </p>
                    <p class="lightGrey">
                        版权所有 ECSHOP模板屋网络科技有限公司 （技术支持：
                        <a title="ECSHOP模板" target="_blank" href="http://www.ecshop119.com/">
                            ECSHOP模板
                        </a>
                        ）
                    </p>
                    <div align="center">
                        @foreach($links as $v)
                        <a href="{{$v->url}}">
                            <img src="{{$v->logo}}" border="0" style='width: 260px;height: 42px'>
                        </a>
                        @endforeach
                    </div>
                </div>
                <div id="bottomNav" class="box" style="display:none">
                    <div class="bNavList clearfix">
                        <div class="f_l">
                            <a href="article.php?id=79">
                                正品保证
                            </a>
                            -
                            <a href="article.php?id=85">
                                会员注册
                            </a>
                            -
                            <a href="article.php?id=87">
                                收货样品
                            </a>
                            -
                            <a href="article.php?id=83">
                                导购演示
                            </a>
                            -
                            <a href="article.php?id=86">
                                账户管理
                            </a>
                            -
                            <a href="article.php?id=90">
                                货到付款
                            </a>
                            -
                            <a href="article.php?id=97">
                                退货政策
                            </a>
                            -
                            <a href="article.php?id=98">
                                退货流程
                            </a>
                        </div>
                    </div>
                </div>
                <div id="footer" style="height:0; width:1px; overflow:hidden; background:none; margin:0;">
                    <div class="text">
                        &copy; 2005-2016 最新ECSHOP唯品会模板【ECSHOP唯品会模板】唯品会模板-ECSHOP模板屋 版权所有，并保留所有权利。
                        <br />
                        <br />
                        共执行 11 个查询，用时 0.029687 秒，在线 3 人，Gzip 已禁用，占用内存 3.571 MB
                        <img src="/home/picture/cron.php" alt="" style="width:0px;height:0px;" />
                        <br />
                        <br />
                        <div align="left" id="rss">
                            <a href="feed.php">
                                <img src="/home/picture/xml_rss2.gif" alt="rss" />
                            </a>
                        </div>
                    </div>
                </div>
                
                <script>
                    $(function() {
                        isIe6 = false;

                        if ('undefined' == typeof(document.body.style.maxHeight)) {
                            isIe6 = true;
                        }
                        var offset = $("#topcontrol").offset();
                        var bottom = $("#topcontrol").css("bottom");
                        $("#topcontrol #sider_returntop").click(function() {
                            $('body,html').animate({
                                scrollTop: 0
                            },
                            500);
                            return false;
                        });
                    })
                </script>
            </div>
        </div>
        <script type="text/javascript">
            var button_compare = '';
            var exist = "您已经选择了%s";
            var count_limit = "最多只能选择4个商品进行对比";
            var goods_type_different = "\"%s\"和已选择商品类型不同无法进行对比";
            var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
            var btn_buy = "购买";
            var is_cancel = "取消";
            var select_spe = "请选择商品属性";
        </script>
    </body>

</html>
