@extends('layout.admin')
@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
<!-- 内容区域 -->
        <div class="tpl-content-wrapper">
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                           
                            <div class="widget-body  am-fr">
                                <form action="/admin/good" class="am-form tpl-form-border-form tpl-form-border-br" method="get" enctype='multipart/form-data' >
                                    {{csrf_field()}}
                                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                        <div class="am-form-group tpl-table-list-select">
                                            <label>显示</label>
                                            <select data-am-selected="{btnSize: 'sm'}">
                                                <option value="10" @if($num == 10) selected="selected" @endif >  </option>
                                                <option value="20" @if($num == 20) selected="selected" @endif >  </option>


                                                <option value="30" @if($num == 30) selected="selected" @endif >  </option>
                                            </select>
                                        </div>
                                    </div>
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
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                                        <thead>
                                            <tr>
                                                <th>商品ID</th>
                                                <th>商品名称</th>
                                                <th>商品图片</th>
                                                <th>类别</th>
                                                <th>定价</th>
                                                <th>库存</th>
                                                <th>销量</th>
                                                <th>状态</th>
                                                <th>商品等级</th>
                                                <th>促销商品下架时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody> 
                                            @foreach($data as $k=>$v)
                                            <tr class="">
                                                <td class="am-text-middle">{{$v->gid}}</td>
                                                <td class="am-text-middle">{{$v->gname}}</td>
                                                <td>
                                                    <img src="{{$v->gpic}}" style="width: 50px;height: 50px">
                                                </td>
                                                
                                                <td class="am-text-middle">{{$v->cid}}</td>
                                                <td class="am-text-middle">{{$v->price}}</td>
                                                <td class="am-text-middle">{{$v->stock}}</td>
                                                <td class="am-text-middle">{{$v->salecnt}}</td>
                                                <td class="am-text-middle">
                                                    @if($v->status == 0)
                                                        新品

                                                    @elseif($v->status==1)

                                                        上架

                                                    @elseif($v->status == 2)
                                                        下架
                                                    @endif
                                                </td>
                                                <td class="am-text-middle">
                                                    @if($v->level == 0)
                                                        普通商品

                                                    @elseif($v->level==1)

                                                        会员商品

                                                    @elseif($v->level == 2)
                                                        促销商品
                                                    @endif
                                                </td>
                                                <td class="am-text-middle">{{$v->ctime}}</td>
                                                <td class="am-text-middle">
                                                    <div class="tpl-table-black-operation">
                                                        <a href="/admin/good/{{$v->gid}}/edit">
                                                            <i class="am-icon-pencil"></i> 修改
                                                        </a>
                                                        
                                                        <a href="javascript:;" class="sta" data="{{$v->status}}"><i class="am-icon-pencil"></i>
                                                        @if($v->status == 0) 
                                                                上架 
                                                        @elseif ($v->status == 1) 
                                                                下架
                                                        @elseif($v->status == 2)
                                                                上架
                                                        @endif
                                                        </a>
                                                       
                                                        <a href="javascript:;" class="tpl-table-black-operation-del del" data = "{{$v->gid}}">
                                                            <i class="am-icon-trash"></i> 删除
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
                                        {{ $data->links() }}
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


    // 状态
    $('.sta').click(function(){

    var sta = $(this).text();
    var id = $(this).parents('tr').find('td').eq(0).text();
    var aa = $(this).attr('data');
    // console.log(aa);
    var $this = $(this);
    $.get('/admin/goodAjax',{id:id,status:aa},function(data){
            console.log(data);
        if (data == '1') {
            $this.parents('tr').find('td').eq(7).html(sta);
            
            if (aa == '2') {
                $this.html('<i class="am-icon-pencil"></i>下架');
                $this.attr('data','1');
                
            } else if (aa == '1'){
                $this.html('<i class="am-icon-pencil"></i>上架');
                $this.attr('data','2');
            } else if(aa == '0'){
                $this.html('<i class="am-icon-pencil"></i>下架');
                $this.attr('data','1');
            }
        }
    })
    

    });


    // 删除
    $('.del').click(function(){

            // 获取点击的ID
            var gid = $(this).attr('data');
            var $this = $(this);
            // console.log(gid);   
            $.post('/admin/good/delete',{gid:gid},function(data){

                   if (data == '1') {
                        $this.parents('tr').remove();
                   }else{
                        alert('删除失败');
                    }
                
            })
        })

   

    
</script>

@endsection