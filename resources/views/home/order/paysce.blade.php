@extends('layout.home')
@section('address')
        <link href="css/style_2.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/common_2.js"></script>
        <script type="text/javascript" src="js/shopping_flow_2.js"></script>
    </head>

    <body>
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
                    <script type="text/javascript" src="js/default_1.js">
                    </script>
                    <div class="headBox HeadBox">
                        <div class="logo f_l">
                            <a href="http://weipin.ecshop119.com/index.php" name="top">
                                <img src="picture/logo_2.gif">
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
                    <div class="order_map order_map_step3">
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
        <div class="block_s">
            <div class="buytab_a">
                <div class="nstep2_con orderok">
                    <p class="ordertitle">
                        感谢您在本店购物！您的订单已提交成功，请记住您的订单号:
                        <font style="color:#f10180;">
                            {{$oid}}
                        </font>
                    </p>
                    
                    
                    <p style="text-align:center; margin-bottom:20px;">
                        您可以
                        <a href="/home/index">
                            返回首页
                        </a>
                        或去
                        <a href="/home/gerenxinxi">
                            用户中心
                        </a>
                    </p>
                </div>
            </div>
        </div>
@endsection