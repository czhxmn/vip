@extends('layout.home')
@section('content')
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
                            >
                        </code>
                        我的订单
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
            <div class="content_body2" style="color:#666;">
                <div class="box">
                    <div class="box_1">
                        <div class="userCenterBox boxCenterList clearfix">
                            <h5 class="MemberTit">
                                <span>
                                    我的订单
                                </span>
                            </h5>
                            <div class="blank">
                            </div>
                            <div class="blank">
                            </div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#eee">
                                <tr align="center">
                                    <th bgcolor="#ffffff">
                                        订单号
                                    </td>
                                    <th bgcolor="#ffffff">
                                        下单时间
                                    </td>
                                    <th bgcolor="#ffffff">
                                        订单总金额
                                    </td>
                                    <th bgcolor="#ffffff">
                                        订单状态
                                    </td>
                                    <th bgcolor="#ffffff">
                                        操作
                                    </td>
                                </tr>
                                @foreach($r as $k=>$v)
                                <tr align="center">
                                    <td>{{$v->oid}}</td>
                                    <td>{{$v->otime}}</td>
                                    <td>{{$v->ocntp}}</td>
                                    <td>
                                        @if($v->status==1)
                                            未发货
                                        @elseif($v->status==2)
                                            <a href="/home/update/{{$v->oid}}">确认收货</a>
                                        @else
                                            完成
                                        @endif
                                    </td>
                                    <td>
                                        <a href="/home/destroy/{{$v->oid}}" style="color:red;">删除</a>
                                        <a href="/home/orderdet/{{$v->oid}}" style="color:red;">详情</a>
                                    </td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
