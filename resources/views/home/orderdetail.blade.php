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
                        订单详情
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
                                    {{$oid}}
                                </span>
                            </h5>
                            <div class="blank">
                            </div>
                            <div class="blank">
                            </div>
                            <table width="100%" border="0" cellpadding="5" cellspacing="1" bgcolor="#dddddd">
                                <tr align="center">
                                    <th bgcolor="#ffffff">
                                        商品ID
                                    </th>
                                    <th bgcolor="#ffffff">
                                        商品名称
                                    </th>
                                    <th bgcolor="#ffffff">
                                        图片
                                    </th>
                                    <th bgcolor="#ffffff">
                                        单价
                                    </th>
                                    <th bgcolor="#ffffff">
                                        操作
                                    </th>
                                </tr>
                                @foreach($r as $k=>$v)
                                <tr align="center">
                                    <td>{{$v->gid}}</td>
                                    <td>{{$v->gname}}</td>
                                    <td><img src="{{$v->gpic}}" alt="" style="width:100px;height:50px;"></td>
                                    <td>{{$v->price}}</td>
                                    <td><a href="/home/pingq/{{$v->gid}}">评论</a></td>
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
