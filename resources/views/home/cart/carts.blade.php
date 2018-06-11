@extends('layout.home')
@section('address')
        <link href="css/style_1.css" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="js/common_1.js">
        </script>
        <script type="text/javascript" src="js/shopping_flow_1.js">
        </script>
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
                    <script type="text/javascript" src="js/default.js">
                    </script>
                    <div class="headBox HeadBox">
                        <div class="logo f_l">
                            <a href="/home/index" name="top">
                                <img src="picture/logo_1.gif">
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
                    });1
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
                    <div class="order_map order_map_step1">
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
            <script type="text/javascript" src="js/showdiv_1.js">
            </script>
            <script type="text/javascript">
                var user_name_empty = "请输入您的用户名！";
                var email_address_empty = "请输入您的电子邮件地址！";
                var email_address_error = "您输入的电子邮件地址格式不正确！";
                var new_password_empty = "请输入您的新密码！";
                var confirm_password_empty = "请输入您的确认密码！";
                var both_password_error = "您两次输入的密码不一致！";
                var show_div_text = "请点击更新购物车按钮";
                var show_div_exit = "关闭";
            </script>
            <div class="lamp201">
                @if(count($res) > 0)
                <div class="nstep_products">
                    <div class="order_ok_title">
                        <li class="cart-product-remove">
                            <a href="javascript:void" class='quan'>全选</a>
                        </li>
                        <li class="cl_s02" style="width: 300px">
                            .
                        </li>
                         <li class="cl_s02">
                            库存
                        </li>
                        <li class="cl_s02">
                            单价（元）
                        </li>
                        <li class="cl_s03">
                            数量（件）
                        </li>
                        <li class="cl_s04">
                            小计
                        </li>
                        <li class="cl_s05">
                            操作
                        </li>
                    </div>
                     
                    <form  method="get" action="/home/order" id='forms'>
                         {{ csrf_field() }}
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="flowBox" style=" border:0;">
                            <div class="flowCon">
                                        
                                <table border="0" cellpadding="0" cellspacing="0" width="100%">
                                    <tbody>
                                       @foreach($res as $k => $v)
                                        
                                        <tr id="tr_goods_134" class="cartList">
                                            <td class="cart-product-name gitem" gid="{{$v->id}}">
                                                <input type="checkbox" name='ids[]'>
                                            </td>
                                            <td class="nstep_pbox" style="text-align: right; border-bottom: 0px none;"
                                            width="56">
                                                <p>
                                                    <a href="/home/detail/{{$v->gid}}" target="_blank"
                                                    class="FlowSmallImg">
                                                        <img src="{{$v->gpic}}" alt="{{$v->gname}}"
                                                        border="0" height="49" width="49">
                                                    </a>
                                                    <span style="display: none;" class="por_big_img">
                                                        <i class="left_arrow">
                                                        </i>
                                                        <img src="{{$v->gpic}}" alt="{{$v->gname}}">
                                                    </span>
                                                </p>
                                            </td>
                                            <td style="border-bottom: 0px none;" width="235">
                                                <div style=" overflow:hidden; line-height:20px; padding-left:20px;">
                                                    <p class="nstep_name">
                                                        <a href="/home/detail/{{$v->gid}}" target="_blank">
                                                            {{$v->gname}}
                                                        </a>
                                                    </p>
                                                    
                                                </div>
                                            </td>
                                            <td style="border-bottom: 0px none;" class="f7" align="center" bgcolor="#ffffff"
                                            width="159">
                                                
                                                <span class="stock">
                                                    {{$v->stock}}
                                                </span>
                                            </td>
                                            <td style="border-bottom: 0px none;" class="f7" align="center" bgcolor="#ffffff"
                                            width="159">
                                                ￥
                                                <span class="price">
                                                    {{$v->price}}
                                                </span>
                                            </td>
                                            <td style="border-bottom: 0px none;" align="center" bgcolor="#ffffff"
                                            width="140">
                                                <a href="javascript:void(0)"  class="minus jian">
                                                </a>
                                                <input name="shuliang" carts='{{$v->id}}' id="goods_number_134" value="{{$v->xiaoji}}" size="1"
                                                class="inp_num" style="text-align:center" onchange="change_goods_number(134,this.value)"
                                                type="text">
                                                <a  href="javascript:void(0)"  class="plus jia">
                                                </a>
                                            </td>
                                            <td style="border-bottom: 0px none;" id="goods_subtotal_134" class="f8"
                                            align="center" bgcolor="#ffffff">
                                                ￥
                                                <span class="xiaoji">
                                                    {{$v->price}}
                                                </span>
                                            </td>
                                            <td style="border-bottom: 0px none;" align="center" bgcolor="#ffffff"
                                            width="56">
                                                <a href="javascript:void(0)" class="shoucang" gid='{{$v->gid}}'>
                                                    收藏
                                                </a>
                                                <br>
                                                <a href="javascript:void(0)" class="remove" gid='{{$v->id}}'>
                                                    删除
                                                </a>
                                            </td>
                                        </tr>
                                     @endforeach    
                                    </tbody>

                                </table>
                                 
                                <input name="step" value="update_cart" type="hidden">
                                <div class="cl_pay_detail">
                                     
                                    <div class="cart_detail_bottom clearfix " id="total_desc">
                                        <span class="line_between">
                                            总金额（不含运费）：
                                            <b>
                                                ￥
                                                <span class="amounts">
                                                   00.00
                                                </span>
                                            </b>
                                        </span>
                                    </div>
                                </div>
                                <input type="hidden" name='zong' value="" class="hidden">
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
                             
                            <div class="orderaction">
                                <span style="text-align:left;font-size:12px;float:left; display:inline-block;">
                                    <input value="继续购买" class="bnt_blue_q" onclick="location.href='/home/index'"
                                    type="button">

                                </span>
                                <button class="continueFind" type="submit">
                                    立即结算
                                </button>

                            </div>

                           
                            <script type="text/javascript">
                                $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                }
                            });
                            

                            $(':checkbox').click(function(){
                                // 判断是否选择,选中发ajax修改状态为1,没选种发送0
                                if($(this).is(':checked')){
                                    // 获取id
                                    var id = $(this).parent().attr('gid');
                                    
                                    $.get('/home/CartStatus',{id:id,status:1},function(data){
                                        
                                    });
                                }else{
                                    var id = $(this).parent().attr('gid');
                                    
                                    $.get('/home/CartStatus',{id:id,status:0},function(data){
                                        
                                    });
                                }
                            })
                                
                                
                                    
                            var AV = true;
                            //给加号点击事件,点一下发送一下ajax去修改购物车数据表里小计的数量
                            $('.jia').click(function(){
                                //获取库存
                                var stock = $(this).parents('.cartList').find('.stock').html();
                                var stock = parseInt(stock);
                                




                                var shuliang = $(this).parent().find('.inp_num').val()

                                var shuliang = parseInt(shuliang) + 1;
                                if (shuliang > stock) {
                                    alert('非常抱歉,商品库存不足!');
                                    AV = false;
                                }else{
                                    AV = true;
                                }
                                
                                var carts = $(this).parent().find('.inp_num').attr('carts');


                                $.get('/home/number',{xiaoji:shuliang,id:carts},function(data){
                                    
                                })

                            })

                            

                            //给减号点击事件,点一下发送一下ajax去修改购物车数据表里小计的数量
                            $('.jian').click(function(){

                                //获取库存
                                var stock = $(this).parents('.cartList').find('.stock').html();
                                var stock = parseInt(stock);
                                


                                var shuliang = $(this).parent().find('.inp_num').val();
                                
                                if (shuliang > 1){
                                    
                                    var shuliang = parseInt(shuliang) - 1;
                                }else{
                                    shuliang = 1;
                                }

                                if (shuliang > stock) {
                                    
                                    AV = false;
                                }else{
                                    AV = true;
                                }
                               
                                var carts = $(this).parent().find('.inp_num').attr('carts');

                                $.get('/home/number',{xiaoji:shuliang,id:carts},function(data){
                                    
                                })

                            })

                            //控制提交按钮
                            $('.continueFind').click(function(){
                                if (AV) {
                                    return true;
                                }else{
                                    return false;
                                }
                            })


                            //加法运算
                            $('.plus').each(function(){
                                $(this).click(function(){
                                    //获取数量的值
                                    var pv = $(this).prev().val();

                                    pv++;

                                    $(this).prev().val(pv);

                                    //获取单价
                                    var pa = $(this).parents('tr').find('.price').text();     

                                    var pr =  parseInt(pa);


                                    // 乘法

                                    function accMul(arg1,arg2){   
  
                                        var m=0,s1=arg1.toString(),s2=arg2.toString();   
                                      
                                        try{m+=s1.split(".")[1].length}catch(e){}   
                                      
                                        try{m+=s2.split(".")[1].length}catch(e){}   
                                      
                                        return Number(s1.replace(".",""))*Number(s2.replace(".",""))/Math.pow(10,m)   
                                      
                                    }
                                    

                                    $(this).parents('tr').find('.xiaoji').text(accMul(pr, pv));

                                    func()
                                })

                            })
                            //减法运算

                            $('.minus').each(function(){

                                $(this).click(function(){

                                    var mv = $(this).next().val();

                                    mv--;

                                    if(mv <= 1){

                                        mv = 1;
                                    }

                                    $(this).next().val(mv);

                                    //获取单价
                                    var pa = $(this).parents('tr').find('.price').text();


                                    var pr =  parseInt(pa);

                                    //乘法
                                    function accMul(arg1, arg2) {

                                        var m = 0, s1 = arg1.toString(), s2 = arg2.toString();

                                        try { m += s1.split(".")[1].length } catch (e) { }

                                        try { m += s2.split(".")[1].length } catch (e) { }

                                        return Number(s1.replace(".", "")) * Number(s2.replace(".", "")) / Math.pow(10, m)

                                    }

                                    $(this).parents('tr').find('.xiaoji').text(accMul(pr, mv));

                                    func()
                                })
                            })


                            //让总计发生改变
                            $(':checkbox').click(function(){

                                func()
                                    
                            })  

                            

                            function func(){

                                var num = 0;
                                $(':checkbox:checked').each(function(){


                                    var ji = $(this).parents('tr').find('.xiaoji').text();

                                    function numAdd(num1, num2) { 
                                        var baseNum, baseNum1, baseNum2; 
                                        try { 
                                        baseNum1 = num1.toString().split(".")[1].length; 
                                        } catch (e) { 
                                        baseNum1 = 0; 
                                        } 
                                        try { 
                                        baseNum2 = num2.toString().split(".")[1].length; 
                                        } catch (e) { 
                                        baseNum2 = 0; 
                                        } 
                                        baseNum = Math.pow(10, Math.max(baseNum1, baseNum2)); 
                                        return (num1 * baseNum + num2 * baseNum) / baseNum; 
                                    };

                                    $('.amounts').text(num = numAdd(num,ji));
                                    var z = $('.amounts').html();
                                    $('.hidden').val(z);
                                     
                                    
                                })

                            }
                            
                           
                           
                            //全选
                            $('.quan').click(function(){

                                $(':checkbox').each(function(){

                                    this.checked = true;
                                })

                                func();

                            })

                            //添加数据到收藏页面
                            $('.shoucang').click(function(){
                                var tr = $(this).parents('tr');

                                //获取id
                                var gid = $(this).attr('gid');

                                var $this = $(this);

                                //获取文本
                                var wen = $(this).html();

                                if (wen == '已收藏' ) {
                                    alert('商品已经收藏了');
                                    return;
                                }else{

                                    $.get('/home/shoucangAjax',{gid:gid},function(data){
                                            console.log(data);

                                        if (data == '1') {
                                            alert('已添加至收藏');
                                            $this.html('已收藏');
                                            func();
                                        }else{
                                            location.reload();
                                        }
                                    })
                                }
                            })

                            

                            //删除数据
                            $('.remove').click(function(){


                                var res = confirm('你确定删除吗??');

                                if(!res) return;

                                var tr = $(this).parents('tr');

                                //获取id
                                var gid = $(this).attr('gid');

                                
                                //发送ajax
                                $.get('/home/ajax',{id:gid},function(data){
                                    if(data != '0'){

                                        tr.remove();


                                        func();
                                    } else {
                                       
                                        location.reload();


                                    }
                                })
                            })


                            </script>
                            
                        </div>
                    </form>
                </div>
            </div>
            @else 
            
            <div class="cart-empty">
                <center>
                    <div class="message">
                        <ul>
                            <li class="txt">
                                购物车空空的哦~，去看看心仪的商品吧~
                            </li>
                            <li class="mt10">
                                <a href="/home/index" class="ftx-05">
                                    去购物&gt;
                                </a>
                            </li>
                            
                        </ul>
                    </div>
                </center>
            </div>

            @endif
        </div>
@endsection