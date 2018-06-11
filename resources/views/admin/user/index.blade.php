@extends('layout.admin')
@section('content')
        <!-- 内容区域 -->
        <div class="tpl-content-wrapper">
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">

                    <div class="widget-head am-cf">
                        <div class="widget-title  am-cf">
                            用户管理
                        </div>
                    </div>
                    <form action="/admin/user" method='get'>

                   
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
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black "
                        id="example-r">
                            <thead>
                                <tr>
                                    <th>
                                        ID
                                    </th>
                                    <th>
                                        用户名
                                    </th>
                                    <th>
                                        权限
                                    </th>
                                    <th>
                                        状态
                                    </th>
                                    <th>
                                        操作
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($res as $k => $v)
                                <tr class="gradeX">
                                    <td class='aj-id'>
                                        {{$v->uid}}
                                    </td>
                                    <td>
                                        {{$v->uname}}
                                    </td>
                                    <td>
                                        
                                        @if($v->auth == 1)
                                            超级管理员
                                        @elseif($v->auth == 2)
                                            管理员
                                        @elseif($v->auth == 3)
                                            VIP
                                        @elseif($v->auth == 4)
                                            用户
                                        @endif
                                    </td>
                                    <td>

                                        <div class="am-form-group">
                                           
                                            <div class="am-u-sm-9">
                                                <div class="tpl-switch">
                                                    @if($v->status == 1)
                                                    <input type="checkbox" checked class="ios-switch bigswitch tpl-switch-btn" value="1">
                                                    @else
                                                    <input type="checkbox" class="ios-switch bigswitch tpl-switch-btn" value="0">
                                                    @endif
                                                    <div class="tpl-switch-btn-view">
                                                        <div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tpl-table-black-operation">
                                            
                                            <a href="/admin/user/{{$v->uid}}/edit">
                                                <i class="am-icon-pencil">
                                                </i>
                                                编辑
                                            </a>
                                            
                                            <a href="javascript:;" class="tpl-table-black-operation-del ushanchu">
                                                <i class="am-icon-trash">
                                                </i>
                                                删除
                                            </a>
                                                
                                            
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

@section('js')
    <script>
       
        //点击修改状态
        $('.tpl-switch').click(function(){
            
            //获取ID
            var id = $(this).parents('tr').find('.aj-id').text();
            
            //获取状态
            var che =$(this).find(':checkbox');
            var val =che.val();


            //发送ajax
            $.get('/admin/userajax',{id:id,status:val},function(data){

                if(data){

                    if(val == 1){
                        che.val(0);
                        che.removeAttr('checked');
 
                    }
                    if(val ==0) 
                        che.val(1);
                        che.attr('checked',true);
                    }else {

                        alert('修改失败');

                }

            })

        })

        //删除
        $('.ushanchu').click(function(){
            //获取ID
            var trr = $(this).parents('tr');
            var id = trr.find('.aj-id').text();
            //发送ajax
            $.ajax({
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/user/"+id,
                        data:{id:id},
                        dataType: "json",
                        success: function(data){

                            // 如果删除成功
                            if(data.status== 1){
                                
                                alert(data.msg);
                                trr.remove();

                            }else{
                                
                                alert(data.msg);
                            }
                        }

                    })
                })
        

    </script>
@endsection


