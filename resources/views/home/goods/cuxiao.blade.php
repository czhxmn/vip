@extends('layout.home')
@section('content')
        <link href="/home/css/style_1.css" rel="stylesheet" type="text/css" />
        <script type="text/javascript" src="/home/js/global.js">
        </script>
        <script type="text/javascript" src="/home/js/compare.js">
        </script>
        <div class="block">
            <!--<p></p>-->
            <div class="contentBody">
                <div class="mainBody">
                    <div id="small-nav">  
                        <div class="f-l where">
                            <div class="first">
                                价格
                            </div>
                            <ul class="where-ul">
                                <li>
                                    <span>
                                        全部
                                    </span>
                                </li>
                                <li>
                                    <a href="category.php?id=407&amp;price_min=50&amp;price_max=100">
                                        50&nbsp;-&nbsp;100
                                    </a>
                                </li>
                                <li>
                                    <a href="category.php?id=407&amp;price_min=150&amp;price_max=200">
                                        150&nbsp;-&nbsp;200
                                    </a>
                                </li>
                                <li>
                                    <a href="category.php?id=407&amp;price_min=450&amp;price_max=500">
                                        450&nbsp;-&nbsp;500
                                    </a>
                                </li>
                            </ul>
                            <div class="filter_more">
                                <a href="javascript:;" class="where-more f_r brand_where">
                                    <span>
                                        更多
                                    </span>
                                    <i>
                                    </i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <!--<div id="more_options">
                    <div id="mo_bg"></div>
                    <a href="javascript:;" id="mo_bt">更多选项<i id="mo_op"></i></a>
                    </div>-->
                    <script type="text/javascript">
                        $(function() {

                            $(".filter_more").each(function() {
                                var parent = $(this).parent(".where");
                                var h1 = parent.css("height");
                                parent.css({
                                    height: "auto"
                                });
                                var h2 = parent.outerHeight();
                                parent.css({
                                    height: h1
                                });
                                var done = false;
                                var ul = $(this).parent(".where").find("ul").height();
                                if (ul <= parseInt(h1)) {
                                    $(this).hide();
                                }
                                $(this).click(function() {
                                    var h3 = parent.css("height");

                                    if (!done) {
                                        done = !done;
                                        parent.stop().animate({
                                            height: h2 - 10
                                        });
                                        $(this).find("span").text("收缩");
                                        $(this).find("i").css("background-position", "0 -71px");
                                    } else {
                                        done = !done;
                                        parent.stop().animate({
                                            height: h1
                                        });
                                        $(this).find("span").text("更多");
                                        $(this).find("i").css("background-position", "0 -65px");
                                    }
                                });
                            });
                            /*
    (function(){
        var fn=function(){
            var len=$(".where").length;
            if(len<=5){
                $("#mo_bt").hide();
            }
            for(var i=len-1;i>4;i--){
                $(".where").eq(i).hide();
            }
        }
        fn();
        var done=false;
        $("#mo_bt").click(function(){
            if(!done){
                $(".where").show();
                done=!done;
                $(this).html("精简选项"+"<i id='mo_up'></i>");
            }else{
                fn();
                done=!done;
                $(this).html("更多选项"+"<i id='mo_op'></i>");
            }
        });
    })();
    */
                            //
                            $("#small-nav .where:last").css("border-bottom", "0");
                        });
                    </script>
                </div>
            </div>
        </div>
        <div class="content_c">
            <div class="searchBody block">
                <div class="block clearfix">
                    <div class="AreaR" style="width:100%;">
                        <div class="searchRight_title">
                            <div class="rightTitle_left">
                                <form method="GET" class="sort" name="listform">
                                    <div class="f_l ProFilter" style="display:block;">
                                        <a href="javascript:;" style="display:none;" onClick="javascript:display_mode('list')">
                                            <img src="picture/display_mode_list.gif" alt="">
                                        </a>
                                        <a href="javascript:;" style="display:none;" onClick="javascript:display_mode('grid')">
                                            <img src="picture/display_mode_grid_act.gif" alt="">
                                        </a>
                                        <a href="javascript:;" style="display:none;" onClick="javascript:display_mode('text')">
                                            <img src="picture/display_mode_text.gif" alt="">
                                        </a>
                                       
                                        <a style="display:block;" class="Sort" href="category.php?category=407&display=grid&brand=0&price_min=0&price_max=0&filter_attr=0&page=1&sort=sales_volume&order=DESC">
                                            销量
                                        </a>
                                        
                                        <a style="display:block;" class="Sort" href="category.php?category=407&display=grid&brand=0&price_min=0&price_max=0&filter_attr=0&page=1&sort=shop_price&order=ASC">
                                            价格
                                        </a>
                                    </div>
                                </form>
                                <div class="Next-pre" style="display:none;">
                                    <span>
                                        <label>
                                            1 / 1
                                        </label>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <div class="h39" style="height:39px; display:none;">
                        </div>
                        <form action="/home/list" name="compareForm" method="post" onSubmit="return compareGoods(this);" enctype='multipart/form-data'>
                            {{csrf_field()}}

                            
                            
                            <div class="searchRight_body product_list pb30">
                                <ul class="y_searchList clearfix">
                                    @foreach($level as $k=>$v)
                                    
                                    <li class="gItem_198"  style="margin-right:0;padding:5.2px;">
                                        <div class="pro_item_img">
                                            <a href="/home/detail/{{$v->gid}}" title="{{$v->gname}}"
                                            target="_blank">
                                                <img src="{{$v->gpic}}" alt="{{$v->gname}}"
                                                width="320" height="186">
                                            </a>
                                        </div>
                                        <div class="pro_item_tit">
                                            <a href="#" title="{{$v->gname}}"
                                            target="_blank">
                                                
                                                {{$v->gname}}
                                            </a>
                                        </div>
                                        <div class="pro_item_info">
                                            <div class="pro_item_info_L">
                                                ￥
                                                <span>
                                                    {{$v->price}}
                                                </span>
                                            </div>
                                            
                                            <div class="pro_item_info_R">
                                                <span class="pro_item_count_person">
                                                    <em>
                                                        {{$v->stock}}
                                                    </em>
                                                    库存
                                                </span>
                                                <a href="javascript:addToCartShowDiv(199,1,'goodsList')" class="Addcart Sub">
                                                </a>
                                            </div>
                                        </div>
                                        <input type="hidden" value="home/picture/199_thumb_g_1403133749580.jpg" name="goodsThumb"/>
                                        
                                    </li>
                                  
                                    @endforeach
                                    
                                </ul>
                            </div>
                        </form>
                        <script type="text/javascript">
                            $(".y_searchList li").hover(function() {
                                $(this).find(".Addcart").css({
                                    "display": "block"
                                });
                                $(this).find(".pro_item_count").stop(true, false).animate({
                                    "bottom": 0
                                },
                                300);
                            },
                            function() {
                                $(this).find(".Addcart").css({
                                    "display": "none"
                                });
                                $(this).find(".pro_item_count").animate({
                                    "bottom": -22 + "px"
                                },
                                200);
                            });
                        </script>
                        <script type="Text/Javascript" language="JavaScript">
                            // < !--
                            function selectPage(sel) {
                                sel.form.submit();
                            }
                            //-->

                        </script>
                        <script type="text/javascript">
                            window.onload = function() {
                                Compare.init();
                                fixpng();
                            }
                            var button_compare = '';
                            var exist = "您已经选择了%s";
                            var count_limit = "最多只能选择4个商品进行对比";
                            var goods_type_different = "\"%s\"和已选择商品类型不同无法进行对比";
                            var compare_no_goods = "您没有选定任何需要比较的商品或者比较的商品数少于 2 个。";
                            var btn_buy = "购买";
                            var is_cancel = "取消";
                            var select_spe = "请选择商品属性";
                        </script>
                        <form name="selectPageForm" action="/category.php" method="get">
                        </form>
                        <script type="Text/Javascript" language="JavaScript">
                            // < !--
                            function selectPage(sel) {
                                sel.form.submit();
                            }
                            //-->

                        </script>
                    </div>
                </div>
            </div>
        </div>
        </div>
@endsection