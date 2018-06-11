@extends('layout.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">广告管理</div>
                            </div>
                                    <form action="/admin/eval" method='get'>
                                    
                                        <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                            <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                                <input type="text" class="am-form-field "
                                                value="{{$search}}" name='search'>
                                                <span class="am-input-group-btn">
                                                    <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search"
                                                    type="submit">
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                    </form>
                                

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>评论ID</th>
                                                <th>评论人</th>
                                                <th>评论商品</th>
                                                <th>评论等级</th>
                                                <th>评论时间</th>
                                                <th>状态</th>
                                                <th>操作</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($res as $k => $v)
                                            <tr class="gradeX">
                                                <td>{{$v->id}}</td>
                                                <td>{{$v->name}}</td>
                                                <td>{{$v->gname}}</td>
                                                <td>
                                                    @if($v->level == '1')
                                                        差评
                                                    @elseif($v->level == '2')
                                                        中评
                                                    @elseif($v->level == '3')
                                                        好评
                                                    @endif
                                                </td>
                                                <td>{{$v->commentsTime}}</td>
                                                <td class='zt'>
                                                    @if($v->status == '1')
                                                        正常
                                                    @elseif($v->status == '2')
                                                        禁言
                                                    @endif
                                                </td>
                                                
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="/admin/pinglun/{{$v->id}}/{{$v->gid}}">
                                                            <i class="am-icon-pencil">
                                                            </i>
                                                            详情
                                                        </a>
                                                        <a href="javascript:;" data="{{$v->status}}" date="{{$v->id}}" class="tpl-table-black-operation-del sta">
                                                            <i class="am-icon-trash">
                                                            </i>
                                                            @if($v->status == '1')
                                                                禁言
                                                            @elseif($v->status == '2')
                                                                正常
                                                            @endif
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @section('js')
                                            <script type="text/javascript">
                                               $.ajaxSetup({
                                                    headers: {
                                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                                    }
                                                });
                                               // 给状态按钮点击事件
                                               $('.sta').click(function(){
                                                    var status = $(this).attr('data');
                                                    var id = $(this).attr('date');
                                                    var dis = $(this).text();
                                                    var dvs = $(this).parents('tr').find('.zt').text();
                                                    var $this = $(this);
                                                    $.get('/admin/evalajax',{id:id,status:status},function(data){
                                                        if (data == '1') {
                                                            $this.html('<i class="am-icon-trash"></i>'+dvs);
                                                            $this.parents('tr').find('.zt').html(dis);

                                                            if (status == '1') {
                                                                $this.attr('data','2')
                                                            }else{
                                                                $this.attr('data','1')
                                                            }
                                                        }
                                                    })
                                               })


                                            </script>
                                            
                                            @endsection

                                            
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
                                        {{$res->links()}}
                                        
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


