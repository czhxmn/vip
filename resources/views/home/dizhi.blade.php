@extends('layout.home')
@section('content')
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
        <div id="container" style=" padding:0 0 10px;">
            <div class="contentBody">
                 <div class="block_s">
                    <div class="content_title search_title">
                        <div class="block">
                            <div id="ur_here">
                                <a href="/home/index">
                                    首页
                                </a>
                                <code>
                                    &gt;
                                </code>
                                    收货地址
                            </div>
                        </div>
                    </div>
                   <div class="accountSide CenterLeft">
                        <dl class="accountSideOption1 OrderCenter">
                            <dt class="transaction_manage">
                                订单中心
                            </dt>
                            <dd>
                                <ul>
                                    <li>
                                        <a href="/home/myorder">
                                            我的订单
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/home/dizhi">
                                            收货地址
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/home/mydizhi">
                                            地址信息
                                        </a>
                                    </li>
                                
                                </ul>
                            </dd>
                        </dl>
                        <dl class="accountSideOption1">
                            <dt class="transaction_manage">
                                会员中心
                            </dt>
                            <dd>
                                <ul>
                                    <li>
                                        <a href="/home/gerenxinxi">
                                            用户信息
                                        </a>
                                    </li>
                                    <li>
                                        <a href="/home/shoucang">
                                            我的收藏
                                        </a>
                                    </li>

                                    <li>
                                        <a href="/home/mycomment">
                                            我的评论
                                        </a>
                                    </li>
                                </ul>
                            </dd>
                        </dl>

                        <script type="text/javascript">
                            $(".AccountCenter li:last").css("border-bottom", "0");
                        </script>
                    </div>

    <script type="text/javascript" src="/home/css/jquery-1.10.2-hash-bdce12c9.js"></script>
    <script type="text/javascript" src="/home/css/core3-hash-95fd0822.js"></script>
    <link rel="stylesheet" type="text/css" href="/home/css/sidebar-hash-acb01393.css">
    <link rel="stylesheet" type="text/css" href="/home/css/common-hash-7a382976.css">

    <script src="/home/css/address-hash-53417052.js"></script>

     <link href="/home/css/headcom-hash-61f31211.css" rel="stylesheet" type="text/css">
    <link charset="utf-8" type="text/css" rel="stylesheet" href="/home/css/address-hash-ff86ddcd.css">

<form action="/home/store" method="get" accept-charset="utf-8">
<input type="hidden" name="uid" value="{{$uid}}">
{{ csrf_field() }}
<div class="m-body">
    <div class="m-common-wrap">

        <div class="m-wrap-right">
            


            <div class="m-own-address">
               
                    <a href="javascript:;" role="button" mars_sead="235|2|1|3" class="u-address-a ui-btn-medium J-btn-add-address ui-btn-primary">新增收货地址</a>

             
                <div class="m-delete-address-tip ui-tooltips ui-tooltips-handle ui-tooltips-bottom-right-arrow z-ui-tooltips-in">
                    <div class="ui-tooltips-arrow"> <i class="arrow arrow-out">◆</i> <i class="arrow">◆</i>
                    </div>

                </div>

            </div>
            <div class="m-address-form m-add-address" id="J-address-form">

                <h3 class="u-modify-title"></h3>
                <div class="m-from">
                    <div class="u-address-input">
                        <label class="ui-label u-address-label ui-input-title"> <strong class="u-star">*</strong>
                            收货人：
                        </label>
                        <div class="ui-form-item-group f-nowrap">
                            <div class="ui-tooltips ui-tooltips-warning ui-tooltips-left-arrow">
                                <div class="ui-tooltips-arrow">
                                    <i class="arrow arrow-out">◆</i>
                                    <i class="arrow">◆</i>
                                </div>

                                <div class="ui-tooltips-content">
                                    <p class="ui-tooltips-msg">
                                        <i class="vipFont if-sigh"></i>
                                        <span class="u-error-msg"></span>
                                    </p>
                                </div>
                            </div>
                            <input type="text" class="ui-input u-consignee-input" name="name" value="" maxlength="16" id="consignee" placeholder="收货人姓名">
                        </div>
                    </div>


                    <div class="u-address-input">
                        <label class="ui-label u-address-label ui-input-title"> <strong class="u-star">*</strong>
                           地址：
                        </label>
                        <div class="ui-form-item-group f-nowrap">
                            <div class="ui-tooltips ui-tooltips-warning ui-tooltips-left-arrow">
                                <div class="ui-tooltips-arrow">
                                    <i class="arrow arrow-out">◆</i>
                                    <i class="arrow">◆</i>
                                </div>




                                <div class="ui-tooltips-content">
                                     <p class="ui-tooltips-msg">
                                        <i class="vipFont if-sigh"></i>
                                        <span class="u-error-msg"></span>
                                    </p>
                                </div>
                            </div>
                            <input type="text" class="ui-input u-address-info-input" name="address" value="" maxlength="70" id="addressInfo" placeholder="详细地址">
                        </div>

                    </div>
                    <!-- 展示用户选择的四级地址 -->
                    <div class="u-address-input u-own-address-error J-own-address-error" style="display: none;">
                        <label class="ui-label u-address-label ui-input-title"></label>
                        <div class="u-own-address-error-tip J-own-address-error-tip"></div>
                    </div>

                    <div class="u-address-input">
                        <label class="ui-label u-address-label ui-input-title">
                            <strong class="u-star">*</strong>
                            手机：
                        </label>
                        <div class="ui-form-item-group f-nowrap">
                            <div class="ui-tooltips ui-tooltips-warning ui-tooltips-left-arrow">
                                <div class="ui-tooltips-arrow">
                                    <i class="arrow arrow-out">◆</i>
                                    <i class="arrow">◆</i>
                                </div>

                                <div class="ui-tooltips-content">
                                    <p class="ui-tooltips-msg">
                                        <i class="vipFont if-sigh"></i>
                                        <span class="u-error-msg"></span>
                                    </p>
                                </div>
                            </div>
                            <input type="text" class="ui-input u-mobile-input" name="phone" value="" id="mobile" placeholder="手机号" defaultdata="">
                        </div>

                    </div>



                    <hr class="u-form-hr">
                    <div class="u-submit-btn">
                        <button type="submit" mars_sead="235|2|1|1" role="button" class="ui-btn-medium ui-btn-primary" id="J-address-form-submit">保存收获地址</button>
                        <!-- <a href="javascript:;" mars_sead="235|2|1|1" role="button" class="ui-btn-medium ui-btn-primary" id="J-address-form-submit">保存收货地址</a> -->
                        <a href="javascript:;" mars_sead="235|2|1|2" class="u-address-form-cancle f-hidden" id="J-address-form-cancle">取消</a>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
</div>

</form>

@endsection