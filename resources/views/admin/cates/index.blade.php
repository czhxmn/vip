@extends('layout.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            @if(session('msg'))
                                <div class="mws-form-message error">
                                     <ul>
                                        <li style="list-style: none;">{{session('msg')}}</li>
                                    </ul>
                                    
                                </div>
                            @endif
                            @if(session('ms'))
                                <div class="mws-form-message error">
                                     <ul>
                                        <li style="list-style: none;">{{session('ms')}}</li>
                                    </ul>
                                    
                                </div>
                            @endif
                            <form action="/admin/cate" class="am-form tpl-form-border-form tpl-form-border-br" method="get" enctype='multipart/form-data'>
                                {{csrf_field()}}
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                    <div class="am-form-group tpl-table-list-select">
                                        <label>显示</label>
                                        <select data-am-selected="{btnSize: 'sm'}">
                                            <option value="10" @if($num == 10) selected="selected" @endif >  </option>
                                            <option value="20" @if($num == 20) selected="selected" @endif >  </option>
                                            <option value="30" @if($num == 30)  selected="selected" @endif >  </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" class="am-form-field " value = "{{$search}}" name='search'>
                                        <span class="am-input-group-btn">
                                            <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit"></button>
                                        </span>
                                    </div>
                                </div>  
                            </form>
                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="
                                    ">
                                        <thead>
                                            <tr>
                                                <td>编号</td>
                                                <td>类别名称</td>
                                                <td>父ID</td>
                                                <td>PATH</td>
                                                <td>操作</td>
                                                
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($res as $k=>$v)
                                            <tr class="">
                                                <td >{{$v->cid}}</td>
                                                <td class='cname'>{{$v->cname}}</td>
                                                <td>{{$v->pid}}</td>
                                                <td>{{$v->path}}</td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="/admin/cate/{{$v->cid}}/edit">
                                                            <i class="am-icon-pencil"></i> 修改
                                                        </a>
                                                        <form action="/admin/cate/{{$v->cid}}" method='post' style='display:inline'>
                                                            {{csrf_field()}}

                                                            {{method_field('DELETE')}}

                                                            <button class='am-btn am-btn-default am-btn-xs am-text-danger '>删除</button>

                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <style>
                                    .pagination li{
                                        float: left;
                                    height: 20px;
                                    padding: 0 10px;
                                    display: block;
                                    font-size: 12px;
                                    line-height: 20px;
                                    text-align: center;
                                    cursor: pointer;
                                    outline: none;
                                    background-color: #444444;
                                   
                                    text-decoration: none;
                                    border-right: 1px solid #232323;
                                    border-left: 1px solid #666666;
                                    border-right: 1px solid rgba(0, 0, 0, 0.5);
                                    border-left: 1px solid rgba(255, 255, 255, 0.15);
                                    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                                    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                                    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
                                    }
                                </style>
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        {{ $res->links() }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection



@section('js')
<script>

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    //修改用户名
    $('.cname').dblclick(function(){
        //获取中间的文本
        var um = $(this).text().trim();

        //创建input
        var ipn = $('<input type="text" />');
        //
        $(this).empty();
        $(this).append(ipn);

        ipn.val(um);

        ipn.focus();

        ipn.select();

        var td = $(this);

        ipn.blur(function(){

            //获取id
            var id = $(this).parents('tr').find('td').eq(0).text();

            //获取输入的值
            var cname = ipn.val();

            //发送ajax
            $.post('/admin/ajax',{id:id,cname:cname},function(data){


                if(data == '1'){

                    //把td 中间的文本换成输入的值


                    td.text(cname);
                } else {

                    td.text(um);
                }

            })



        })



    })
@endsection
