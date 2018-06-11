@extends('layout.home')
@section('content')
<!-- <script src='/css/jquery-3.2.1.min.js'></script> -->
        <div class="mainBody">
            <div class="IndexBanner">
               <div id="slideBox" class="slideBox IndexAd">
                    <div class="hd">
                        @foreach($ras as $v)
                        <ul>
                            <li>
                                •
                            </li>

                        </ul>
                        @endforeach
                    </div>
                    <div class="bd">
                        <ul>
                            @foreach($ras as $k => $v)
                            <li style="background:url({{$v->pic}}) center 0 no-repeat;">
                                <a href="{{ $v->pid }}" target="_blank">
                                </a>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    <a class="fbc_btn prev" href="javascript:void(0)">
                    </a>
                    <a class="fbc_btn next" href="javascript:void(0)">
                    </a>
                </div>
                <script type="text/javascript">
                    jQuery(".slideBox").slide({
                        mainCell: ".bd ul",
                        effect: "leftLoop",
                        autoPlay: true,
                        trigger: "click"
                    });
                    //
                    $(".small-slider-pic").find(".Line:last").css("display", "none");
                    //
                    var aimg = $(".small-slider-pic").find("a");
                    aimg.hover(function() {
                        aimg.stop(true, false).animate({
                            "opacity": 0.7
                        });
                        $(this).stop(true, false).animate({
                            "opacity": 1
                        });
                    },
                    function() {
                        aimg.stop(true, false).animate({
                            "opacity": 1
                        });
                    });
                    //
                    var Xwid = $(window).width();
                    var left = (Xwid - 980) / 2;
                    $(".prev").css("left", left + 5);
                    $(".next").css("right", left + 5);
                    //
                    $(".fbc_btn").hover(function() {
                        $(this).stop(true, false).animate({
                            "opacity": 1
                        });
                    },
                    function() {
                        $(this).stop(true, false).animate({
                            "opacity": 0.15
                        });
                    });
                    $(".IndexAd").hover(function() {
                        $(this).children(".prev").stop(true, false).animate({
                            "left": left - 7,
                            "opacity": 0.15
                        });
                        $(this).children(".next").stop(true, false).animate({
                            "right": left - 7,
                            "opacity": 0.15
                        });
                    },
                    function() {
                        $(this).children(".prev").stop(true, false).animate({
                            "left": left + 7,
                            "opacity": 0
                        });
                        $(this).children(".next").stop(true, false).animate({
                            "right": left + 7,
                            "opacity": 0
                        });
                    });
                </script>
            </div>
        </div>
        <div style="background:#f0fbfd url(/home/images/day_bottom.jpg) center bottom no-repeat;">
            <div class="block">
                <div class="content" style="padding-bottom:430px;">
                    <div class="contentBody clearfix" style="padding-top:25px;">
                        <div class="IndexL">
                            <div class="a_shop_tit a_shop_today_new">
                            </div>
                            <ul class="shop_onsale">
                                
                                @foreach($res as $key=>$value)
                                
                                <li>
                                    <div class="s_pic">
                                        <div class="s_discount">
                                            <p class="s_name">
                                                {{$value->cname}}专场
                                            </p>
                                            <p class="s_off">
                                                <span class="salebg2">
                                                    2.2
                                                </span>
                                                折起
                                            </p>
                                            <p class="s_time">
                                               
                                            </p>
                                        </div>
                                        <a href="/home/list/{{$value->cid}}">
                                            <img src="{{$value->cimg}}" width="640" height="180" border="0"
                                            />
                                        </a>
                                    </div>
                                </li>
                                
                                @endforeach
                                
                                
                                
                               
                            </ul>
                            <script type="text/javascript">
                                $(".shop_onsale li").each(function() {
                                    $(this).hover(function() {
                                        $(this).addClass("on");
                                    },
                                    function() {
                                        $(this).removeClass("on");
                                    });
                                });
                            </script>
                        </div>
                        <div class="IndexR">
                            <div class="text_post">
                                <p class="J_textAd">
                                    <img class="text_ad_icon" src="/home/picture/201404210918259915.gif" />
                                    
                                </p>
                            </div>
                            <div style=" margin-bottom:15px; display:block;">
                                <div class="box-shadow SlideBox pic_focus">
                                    <div class="hd">
                                        <ul>
                                            <li>
                                                1
                                            </li>
                                            <li>
                                                2
                                            </li>
                                            <li>
                                                3
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="bd">
                                        <ul>
                                            @foreach($adver as $k => $v)
                                            <li>
                                                <a href='{{$v->url}}' target='_blank'>
                                                    <img src='{{$v->pic}}' width='310' height='170' border='0'
                                                    />
                                                </a>
                                            </li>
                                            
                                            @endforeach
                                        </ul>
                                    </div>
                                    <a class="pic_focus_btn prev" href="javascript:void(0)">
                                    </a>
                                    <a class="pic_focus_btn next" href="javascript:void(0)">
                                    </a>
                                </div>
                                <script type="text/javascript">
                                    jQuery(".SlideBox").slide({
                                        mainCell: ".bd ul",
                                        autoPlay: true,
                                        trigger: "click"
                                    });
                                    //
                                    $(".pic_focus_btn").css({
                                        "opacity": 0
                                    });
                                    $(".pic_focus").hover(function() {
                                        $(".pic_focus_btn").stop(true, false).animate({
                                            "opacity": 0.25
                                        });
                                    },
                                    function() {
                                        $(".pic_focus_btn").stop(true, false).animate({
                                            "opacity": 0
                                        });
                                    });
                                </script>
                            </div>
                            <div style="margin-bottom:13px;">
                                <a href='affiche.php?ad_id=135&amp;uri=www.ecshop119.com' target='_blank'>
                                    <img src='/home/picture/1403724195416035834.jpg' width='330' height='50' border='0'
                                    />
                                </a>
                                </a>
                            </div>
                            <div class="Notice box-shadow slideTxtBox">
                                <div class="hd">
                                    <ul>
                                        <li>
                                            唯品博客
                                        </li>
                                        <li>
                                            时尚会
                                        </li>
                                        <li>
                                            合作专区
                                        </li>
                                    </ul>
                                </div>
                                <div class="bd">
                                    <ul>
                                        <li>
                                            <a href="article.php?id=102" title="【奖品升级啦！】小宝贝，大模特，..." target="_blank">
                                                <i>
                                                </i>
                                                【奖品升级啦！】小宝贝，大模特，...
                                            </a>
                                        </li>
                                        <li>
                                            <a href="article.php?id=101" title="“2014唯品会首届创意营销狂人..." target="_blank">
                                                <i>
                                                </i>
                                                “2014唯品会首届创意营销狂人...
                                            </a>
                                        </li>
                                        <li>
                                            <a href="article.php?id=100" title="6月爱特卖，幸运奖上奖！300个..." target="_blank">
                                                <i>
                                                </i>
                                                6月爱特卖，幸运奖上奖！300个...
                                            </a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <a href="article.php?id=105" title="皮鞋包+短裤 英伦洋红chic" target="_blank">
                                                <i>
                                                </i>
                                                皮鞋包+短裤 英伦洋红chic
                                            </a>
                                        </li>
                                        <li>
                                            <a href="article.php?id=104" title="10条基本款连衣裙 夏日美艳度u..." target="_blank">
                                                <i>
                                                </i>
                                                10条基本款连衣裙 夏日美艳度u...
                                            </a>
                                        </li>
                                        <li>
                                            <a href="article.php?id=103" title="达人示范 不足160也能穿出高瘦..." target="_blank">
                                                <i>
                                                </i>
                                                达人示范 不足160也能穿出高瘦...
                                            </a>
                                        </li>
                                    </ul>
                                    <ul>
                                        <li>
                                            <a href="article.php?id=108" title="农行逢双有礼 满百减20" target="_blank">
                                                <i>
                                                </i>
                                                农行逢双有礼 满百减20
                                            </a>
                                        </li>
                                        <li>
                                            <a href="article.php?id=107" title="携手中行储蓄卡，支付乐享双重好礼" target="_blank">
                                                <i>
                                                </i>
                                                携手中行储蓄卡，支付乐享双重好礼
                                            </a>
                                        </li>
                                        <li>
                                            <a href="article.php?id=106" title="广发分享日 满200减100" target="_blank">
                                                <i>
                                                </i>
                                                广发分享日 满200减100
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <script type="text/javascript">
                                    jQuery(".slideTxtBox").slide({});
                                </script>
                            </div>
                            <div class="c_n_like box-shadow">
                                <div class="c_n_like_t">
                                    热销商品
                                </div>
                                <div class="c_n_like_c SlideTxtBox">
                                    <div class="bd">
                                        <ul>
                                            <li>
                                                <a href="goods.php?id=211" title="七彩玫瑰【为爱写的信】">
                                                    <img src="/home/picture/211_thumb_g_1407825208761.jpg" alt="七彩玫瑰【为爱写的信】" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            七彩玫瑰【为爱写的信】
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    589
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=197" title="爱历久弥新">
                                                    <img src="/home/picture/197_thumb_g_1407825661941.jpg" alt="爱历久弥新" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            爱历久弥新
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    45
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=203" title="许你一世芳菲">
                                                    <img src="/home/picture/203_thumb_g_1407825480882.jpg" alt="许你一世芳菲" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            许你一世芳菲
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    158
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=206" title="陪你去未来">
                                                    <img src="/home/picture/206_thumb_g_1407825368010.jpg" alt="陪你去未来" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            陪你去未来
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    181
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=205" title="无可取代">
                                                    <img src="/home/picture/205_thumb_g_1407825417687.jpg" alt="无可取代" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            无可取代
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    196
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=207" title="倾城之恋">
                                                    <img src="/home/picture/207_thumb_g_1407825335605.jpg" alt="倾城之恋" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            倾城之恋
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    199
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=208" title="永生花【春暖花开】">
                                                    <img src="/home/picture/208_thumb_g_1407825314265.jpg" alt="永生花【春暖花开】" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            永生花【春暖花开】
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    112
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=209" title="永生花【春花烂漫】">
                                                    <img src="/home/picture/209_thumb_g_1407825266625.jpg" alt="永生花【春花烂漫】" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            永生花【春花烂漫】
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    179
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=200" title="五月花香">
                                                    <img src="/home/picture/200_thumb_g_1407825570660.jpg" alt="五月花香" width="120"
                                                    height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            五月花香
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    169
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="goods.php?id=210" title="一生的期盼 喜欢你是淡淡的爱">
                                                    <img src="/home/picture/210_thumb_g_1407809508422.jpg" alt="一生的期盼 喜欢你是淡淡的爱"
                                                    width="120" height="70" class="item-image" />
                                                    <div class="item-detail">
                                                        <span class="detail-name">
                                                            一生的期盼 喜欢你是淡淡的爱
                                                        </span>
                                                        <span class="detail-agio">
                                                            <span class="salebg2">
                                                                <span>
                                                                    189
                                                                </span>
                                                            </span>
                                                        </span>
                                                    </div>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="hd">
                                        <div class="hdBox">
                                            <a class="next">
                                            </a>
                                            <a class="prev">
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <script type="text/javascript">
                                    jQuery(".SlideTxtBox").slide({
                                        titCell: ".hd ul",
                                        mainCell: ".bd ul",
                                        autoPage: true,
                                        effect: "topLoop",
                                        autoPlay: true,
                                        scroll: 5,
                                        vis: 5,
                                        easing: "easeInQuint"
                                    });
                                </script>
                            </div>
                        </div>
                    </div>
                   <div class="contentBody clearfix">
                        <div class="a_shop_tit a_shop_hotsell">
                        </div>
                        <div class="shop_lastest">
                            <ul>

                                @foreach($sales as $k => $v)
                                <li class="f_l xx">
                                    <div class="s1_pic iid">
                                        <a class="J_to_list" href="/home/detail/{{$v->gid}}" title="{{$v->gname}}" target="_blank">
                                            <img src="{{$v->gpic}}" alt="{{$v->gname}}">
                                        </a>
                                        <div class="s_info">
                                            <a href="#" target="_blank">
                                                <span>
                                                    查看介绍
                                                </span>
                                                <i class="s_info_story_arrow">
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="s1_info">
                                        <span class="s1_info_name">
                                           {{$v->gname}}
                                        </span>
                                        <span class="s1_info_time">
                                            <span class="s_time_icon2 timeBox" value="{{$v->ctime}}" showday="show">
                                            </span>
                                        </span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                        <!-- vip商品 -->
                     <div class="">
                        <img src="/home/images/14068067785405 (1).jpg" alt="">
                        </div>
                     <div class="shop_lastest">
                            <ul>
                                @foreach($vipg as $k => $v)
                                <li class="f_l">
                                    <div class="s1_pic">
                                        <a class="J_to_list lk" href="/home/detail/{{$v->gid}}" title="{{$v->gname}}" target="_blank">
                                            <img src="{{$v->gpic}}" alt="{{$v->gname}}">
                                        </a>
                                        <div class="s_info">
                                            <a href="#" target="_blank">
                                                <span>
                                                    查看介绍
                                                </span>
                                                <i class="s_info_story_arrow">
                                                </i>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="s1_info">
                                        <span class="s1_info_name">
                                            {{$v->gname}}
                                        </span>
                                        <span class="detail-agio">
                                            <span class="salebg233">
                                                <span>
                                                      ¥ {{$v->price}}              
                                                </span>
                                            </span>
                                        </span>
                                    </div>

                                </li>
                                @endforeach
                            </ul>
                        </div>   
                    </div>
                </div>
            </div>
        </div>
@endsection

