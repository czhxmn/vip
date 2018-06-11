@extends('layout.admin')

@section('content')
<meta name="csrf-token" content="{{ csrf_token() }}">
    内容区域
    <div class="tpl-content-wrapper">
        <div class="row-content am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title  am-cf">
                                {{$oid}}
                            </div>
                        </div>
                        <div class="widget-body  am-fr">
                            <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                <div class="am-form-group">
                                    <div class="am-btn-toolbar">

                                    </div>
                                </div>
                            </div>
                            <div class="am-u-sm-12">
                                <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black "
                                id="example-r">
                                    <thead>
                                        <tr>
                                            <th>
                                                商品ID
                                            </th>
                                            <th>
                                                商品名
                                            </th>
                                            <th>
                                                图片
                                            </th>
                                            <th>
                                                价格
                                            </th>
                                            <th>
                                                小计
                                            </th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($res as $k => $v)
                                        <tr class="gradeX">
                                            <td>
                                                {{$v->gid}}
                                            </td>
                                            <td>
                                                {{$v->gname}}
                                            </td>
                                            <td>
                                                <img src="{{$v->gpic}}" style="width: 100px;height: 50px">
                                            </td>
                                            <td>
                                                {{$v->price}}
                                            </td>
                                            <td>
                                                {{$v->xiaoji}}
                                            </td>
                                            
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection