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
                            <div class="widget-title  am-cf">
                                订单管理
                            </div>
                        </div>
                        <div class="widget-body  am-fr">
                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black "
                                id="example-r">
                                    <thead>
                                        <tr>
                                            <th>
                                                订单号
                                            </th>
                                            <th>
                                                收货人
                                            </th>
                                            <th>
                                                联系方式
                                            </th>
                                            <th>
                                                收货地址
                                            </th>
                                            <th>
                                                总数
                                            </th>
                                            <th>
                                                总金额
                                            </th>
                                            <th>
                                                下单时间
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
                                            <td>
                                                {{$v->oid}}
                                            </td>
                                            <td>
                                                {{$v->receiver}}
                                            </td>
                                            <td>
                                                {{$v->tel}}
                                            </td>
                                            <td>
                                                {{$v->address}}
                                            </td>
                                            <td>
                                                {{$v->ocnt}}
                                            </td>
                                            <td>
                                                {{$v->ocntp}}
                                            </td>
                                            <td>
                                                {{$v->otime}}
                                            </td>
                                            <td>
                                                @if ($v->status==1)
                                                    未发货
                                                @elseif ($v->status==2)
                                                    未收货
                                                @else
                                                    完成
                                                @endif
                                            </td>
                                            <td>
                                                <div class="tpl-table-black-operation">
                                                    <a href="/admin/order/{{$v->oid}}" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-pencil"></i>
                                                        详情
                                                    </a>
                                                    <a href="/admin/order/{{$v->oid}}/edit" class="tpl-table-black-operation-del">
                                                        <i class="am-icon-pencil"></i>
                                                        修改
                                                    </a>
                                                    <form action="/admin/order/{{$v->oid}}" method='post' style='display:inline;color:red;' class="tpl-table-black-operation-del">
                                                        {{csrf_field()}}
                                                        {{method_field('DELETE')}}
                                                        @if($v->status==3)
                                                            <button class="am-icon-trash">删除</button>
                                                        @endif
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
                                    {{$res->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
