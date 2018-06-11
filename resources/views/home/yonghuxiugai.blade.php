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
                                    用户信息
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


<link type="text/css" rel="stylesheet" href="/home/css/alpha1.css" >
<link type="text/css" rel="stylesheet" href="/home/css/alpha2.css" >

<form action="/home/gerenxinxi/{{$uid}}" method="post" id="form1" accept-charset="utf-8" enctype='multipart/form-data'>

            {{ csrf_field() }}
             {{method_field('PUT')}}
    <style type="text/css" media="screen">
        #pang{
           position: relative;
            left:25%;

        .user-set{
            padding:20px 5px 0 15px;
            background-color: #f5f5f5;
        }
        }
    </style>

<div class="mc">
    <div id="pang">
        <div class="user-set userset-lcol">
            <div id="user-info">
               <div class="u-pic">

                    <em style="width: 60px;display: block;position: absolute;">

                    <input type="file" name="pic" style="opacity:0; filter:alpha(opacity=0); height: 100px; width: 100px; position: absolute; top: 0; left: 0; z-index: 9;" onchange="handleFiles(this,'icon')">

                    <img src="{{ $res->pic }}"  style="height: 100px; width: 100px;" id="icon">
                    </em>
                    <div class="face-link-box"></div>
                    <a href="" class="face-link">修改头像</a>
                </div>

                <script>
                    function handleFiles(obj,id) {
                        file = document.getElementById("icon");
                        var files = obj.files;
                        img = new Image();
                        if(window.URL){
                            //File API
                            img.src = window.URL.createObjectURL(files[0]); //创建一个object URL，并不是你的本地路径
                            img.onload = function(e) {
                            window.URL.revokeObjectURL(this.src); //图片加载后，释放object URL
                            }
                        }
                        file.src=img.src;
                        //上传文件
                            var fd = new FormData(),//实例化一个表单
                            xhr = new XMLHttpRequest();
                            xhr.open('get', '/home/gerenxinxi');//请求方式，请求地址
                            xhr.send(fd);
                    }
                </script>

                <div class="info-m">
                    <div>
                        用户名:<input type="text" name="uname" style="border:none;" readonly value="{{ $res->uname }}">
                    </div>
                    <div class="u-level">

                    </div>
                    <!--<div class="shop-level">购物行为评级：<span><a target="_blank" href="//vip.jd.com/help_behaviorRating.html">
                        <s id="userCredit" class="rank-sh rank-sh01"></s></a></span></div> -->
                        @if($res -> auth  ==1)
                        <div>会员类型：普通用户</div>
                        @elseif($res -> auth == 2)
                        <div>会员类型：普通用户</div>

                        @elseif($res -> auth == 3)
                        <div>会员类型：VIP</div>
                         @else($res -> auth == 4)
                        <div>会员类型：普通用户</div>
                        @endif
                </div>
            </div>
        </div>

        <div class="form">

            <div class="item" id="aliasArea">
                <div class="item">
                    <span class="label"></span>
                    <div class="fl">
                        <div><strong></strong></div>
                    </div>
                </div>
                <span class="label"><em></em></span>
                <div class="fl" id="aliasBefore">
                        <strong></strong>
                        <a href="javascript:void(0)" class="ftx-05 ml10"  clstag="pageclick|keycount|201602251|1"></a>
                         <span class="ftx03"></span>
                    <div class="clr"></div><div class="prompt-06"><span id="aliasNameBefore_msg"></span></div>
                </div>
                <div class="fl" id="aliasAfter" style="display: none">

                    <input type="hidden" id="hiddenAliasName" value="">
                    <span class="ftx03">可用于登录，请牢记</span>
                    <div class="clr"></div><div class="prompt-06"><span id="aliasName_msg"></span></div>
                </div>

            </div>
            <div class="item">
                <span class="label"><em>*</em>昵称：</span>
                <div class="fl">
                    <input clstag="homepage|keycount|home2013|infoname" type="text" class="itxt" maxlength="20" id="" name="nickName" value="{{ $res->nickName }}">
                    <div class="clr"></div><div class="prompt-06"><span id="nickName_msg"></span></div>
                </div>
            </div>
            <div class="item">
                <span class="label"><em>*</em>性别：</span>
                <div class="fl"  clstag="homepage|keycount|home2013|infoGender">

                    <input type="radio" name="sex" class="jdradio" value="0" @if ($res->sex == 0) checked @endif><label class="mr10">男</label>

                    <input type="radio" name="sex" class="jdradio" value="1" @if ($res->sex == 1) checked @endif><label class="mr10">女</label>

                    <input type="radio" name="sex" class="jdradio" value="2" @if ($res->sex == 2) checked @endif><label class="mr10">保密</label>

                </div>
            </div>

            <div class="item">
                <span class="label"><em>*</em>邮箱：</span>
                <div class="fl">
                    <input clstag="homepage|keycount|home2013|infoname" type="text" class="itxt" maxlength="20" id="email" name="email" value="{{$res->email}}">
                    <div class="clr"></div><div class="prompt-06"><span id="nickName_msg"></span></div>
                </div>
            </div>

            <div class="item">
                <span class="label"><em>*</em>手机：</span>
                <div class="fl">
                    <input clstag="homepage|keycount|home2013|infoname" type="text" class="itxt" maxlength="20" id="phone" name="phone" value="{{$res->phone}}">
                    <div class="clr"></div><div class="prompt-06"><span id="nickName_msg"></span></div>
                </div>
            </div>

            <div class="item">
                <span class="label">&nbsp;</span>
                <div class="fl" colspan="4" style="padding:20px 0;" align="center" bgcolor="#ffffff">
                    <input id="code" value="850496" style="display:none">
                    <input id="rkey" value="736e6f5f315f67657455736572496e666fbeb0cbae383530343936" style="display:none">
                    <button type="submit" clstag="homepage|keycount|home2013|infobtn" onclick="login()" class="bnt_blue">确定</button>
                    <!-- <a clstag="homepage|keycount|home2013|infobtn" href="javascript:void(0)" class="btn-5" onclick="updateUserInfo()">提交</a> -->
                </div>
            </div>
        </div>
    </div>

    <div class="clr"></div>
</div>

</form>



@endsection
