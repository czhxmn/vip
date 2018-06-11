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
                                <form action="#">
                                <li>
                                    <input type="hidden" name="min" value="0">
                                    <input type="hidden" name="max" value="4000">
                                    <input type="submit" value="0&nbsp;-&nbsp;4000">  
                                </li>
                                <li>
                                    <input type="hidden">
                                    <a href="#">
                                        4000&nbsp;-&nbsp;8000
                                    </a>
                                </li>
                                <li>
                                    <input type="hidden">
                                    <a href="#">
                                        8000&nbsp;-&nbsp;12000
                                    </a>
                                </li>
                            </form>
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
                                    @foreach($data as $k=>$v)

                                    
                                    <li class="gItem_198"  style="margin-right:0;padding:5.2px;">
                                        <div class="pro_item_img">
                                            <a href="/home/detail/{{$v->gid}}" title="{{$v->gname}}">
                                                <img src="{{$v->gpic}}" alt="{{$v->gname}}"
                                                width="320" height="186">
                                            </a>
                                        </div>
                                        <div class="pro_item_tit">
                                            <a href="/home/detail/{{$v->gid}}" title="{{$v->gname}}">
                                                
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
                                                        @if($v->stock > 0)
                                                        {{$v->stock}}
                                                    </em>
                                                        库存
                                                        @else
                                                        此商品库存不足
                                                        @endif
                                                </span>
                                                @if($v->stock > 0)
                                               
                                                @endif
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