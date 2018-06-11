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
                            友情链接管理
                        </div>
                    </div>
                    <form action="/admin/links" method='get'>

                   
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
                                        链接名
                                    </th>
                                    <th>
                                        图片
                                    </th>
                                    <th>
                                        路径
                                    </th>
                                    <th>
                                        简介
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
                                        {{$v->id}}
                                    </td>
                                    <td>
                                        {{$v->linkname}}
                                    </td>
                                    <td>
                                        <img src="{{$v->logo}}" alt="" style='width:147px;height:27px'>
                                    </td>
                                     <td>
                                        {{$v->url}}
                                    </td>
                                    <td>
                                        {{$v->ltext}}
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
                                            
                                            <a href="/admin/links/{{$v->id}}/edit">
                                                <i class="am-icon-pencil">
                                                </i>
                                                编辑
                                            </a>
                                            
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
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
                        .pagination li a{
                    color: #fff;
                    }

                    .pagination .active{
                    background-color: #88a9eb;
                    color: #323232;
                    border: none;
                    background-image: none;
                    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
                    }

                    .pagination .disabled{

                        color: #666666;
                        cursor: default;
                    }

                    

                    .pagination{
                        margin:0px;
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
        $('.am-u-sm-9').click(function(){
            
            //获取ID
            var id = $(this).parents('tr').find('.aj-id').text();
            
            //获取状态
            var che =$(this).find(':checkbox');
            var val =che.val();


            //发送ajax
            $.get('/admin/linkajax',{id:id,status:val},function(data){

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
        $('.tpl-table-black-operation-del').click(function(){
            //获取ID
            var trr = $(this).parents('tr');
            var id = trr.find('.aj-id').text();
            //发送ajax
            $.ajax({
                        type: "DELETE",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/links/"+id,
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


