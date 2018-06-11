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
                                    我的评论
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

                    <div class="nstep_products">
                <div class="order_ok_title">
                    <li class="cl_s01">
                        评论列表
                    </li>

                </div>
               <style type="text/css" media="screen">
                    .flowBox {
                        padding: 15px 30px;
                        width: 660px;
                    }
               </style>


                <form id="formCart" name="formCart" method="post" action="/home/mycomment">

                    <div class="flowBox" style=" border:0;">

                    @foreach($res as $v)
                        <div class="flowCon">
                            <table border="0" cellpadding="0" cellspacing="10" width="100%">
                                <tbody>
                                    <tr id="tr_goods_134" class="cartList">
                                        <td class="nstep_pbox" style="text-align: right; border-bottom: 0px none;"
                                        width="56">
                                            <p>
                                                <a href="/home/detail/{{$v->gid}}" target="_blank"
                                                class="FlowSmallImg">
                                                    <img src="{{ $v->gpic }}" alt=""
                                                    border="0" height="49" width="49">
                                                </a>
                                                <span style="display: none;" class="por_big_img">
                                                    <i class="left_arrow">
                                                    </i>
                                                    <img src="{{ $v->gpic }}" alt="">
                                                </span>
                                            </p>
                                        </td>
                                        <td style="border-bottom: 0px none;" width="89">
                                            <div style=" overflow:hidden; line-height:20px; padding-left:20px;">
                                                <p class="nstep_name">
                                                    <a href="http://weipin.ecshop119.com/goods.php?id=199" target="_blank">

                                                    </a>
                                                </p>
                                                <p style="color:gray; text-align:left;">

                                                </p>
                                            </div>
                                        </td>

                                        <td style="border-bottom: 0px none;" class="f7" align="center" bgcolor="#ffffff"
                                        width="159">

                                            <span>
                                                {{ $v->content }}
                                            </span>
                                        </td>

                                        <td style="border-bottom: 0px none;" class="f7" align="center" bgcolor="#ffffff"
                                        width="159">

                                            <span>
                                                {{ $v->gname }}
                                            </span>
                                        </td>

                                        <td style="border-bottom: 0px none;" class="f7" align="center" bgcolor="#ffffff"
                                        width="159">

                                            <span>
                                                {{ $v->commentsTime }}
                                            </span>
                                        </td>

                                        <td style="border-bottom: 0px none;" align="center" bgcolor="#ffffff"
                                        width="56">
                                             <form action="/home/scpl/{{ $v->gid }}" method='get' style='display:inline'>
                                                {{csrf_field()}}

                                                <button class="tpl-table-black-operation-del">
                                                        删除
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <input name="step" value="update_cart" type="hidden">
                            <script type="text/javascript">
                                $(".flowCon").find("tr:last td").css({
                                    "border-bottom": 0
                                });
                                //
                                $(".FlowSmallImg").each(function() {
                                    $(this).hover(function() {
                                        $(this).siblings().css({
                                            "display": "block"
                                        });
                                    },
                                    function() {
                                        $(this).siblings().css({
                                            "display": "none"
                                        });
                                    });
                                });



                            </script>
                        </div>

                        @endforeach
                    </div>
                </form>

                <div style="width: 600px;height: 200px;">                  
                </div>
            </div>




@endsection
