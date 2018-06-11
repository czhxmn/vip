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
                                    <form action="/admin/adver" method='get'>
                                    
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
                                                <th>ID</th>
                                                <th>广告名</th>
                                                <th>广告图片</th>
                                                <th>广告路径</th>
                                                <th>广告状态</th>
                                                <th>操作</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($res as $k => $v)
                                            <tr class="gradeX">
                                                <td class="bianhao">{{$v->id}}</td>
                                                <td>{{$v->name}}</td>
                                                <td><img src="{{$v->pic}}" style="width: 50px;height: 50px"></td>
                                                <td>{{$v->url}}</td>
                                                <td class="zt">
                                                    @if($v->status == 1) 
                                                                    推送 
                                                    @elseif ($v->status == 0) 
                                                                    禁用
                                                     @endif
                                                </td>
                                            
                                                <td>
                                                   <div class="tpl-table-black-operation">
                                                        
                                                        <button value='{{$v->status}}' class='am-btn-default am-btn-danger sta'> @if($v->status == 0) 
                                                                    推送 
                                                                @elseif ($v->status == 1) 
                                                                    禁用
                                                                 @endif</button>
                                                       
                                                       
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="/admin/adver/{{$v->id}}/edit">
                                                            <i class="am-icon-pencil"></i> 编辑
                                                        </a>
                                                       
                                                            <button  value='{{$v->id}}' class='am-btn-default am-btn-danger shanchu'>删除</button>
                                                        
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
                                                

                                                //给操作按钮单击事件
                                                $('.sta').each(function(){
                                                    $(this).click(function(){
                                                        // 获取id和status
                                                        var tai = $(this).val();
                                                        var ta = $(this).html();
                                                        
                                                        var id = $(this).parents('tr').find('.bianhao').text();
                                                        var $this = $(this);

                                                        // 发送ajax
                                                        $.post('/admin/adver/ajax',{id:id,status:tai},function(data){
                                                              console.log(data);
                                                              if (data == '1') {
                                                                $this.parents('tr').find('.zt').html(ta);
                                                                if(tai == '1'){
                                                                    $this.html('推送');
                                                                    $this.val(0);
                                                                }else{
                                                                    $this.html('禁用');
                                                                    $this.val(1);
                                                                }
                                                              } else{
                                                                $this.parents('tr').find('.zt').html();
                                                              } 
                                                        })
                                                       
                                                    })    
                                                })



                                                // 删除按钮的ajax事件
                                                $('.shanchu').each(function(){
                                                    $(this).click(function(){
                                                        
                                                        //获取点击的id
                                                        var id = $(this).val();
                                                        var $this = $(this);
                                                        // console.log(id);
                                                        $.post('/admin/adver/delete',{id:id},function(data){
                                                            // console.log(data);
                                                            if (data == '1') {
                                                                
                                                                $this.parents('tr').remove();
                                                            }else{
                                                                alert('删除失败');
                                                            }
                                                        })

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


