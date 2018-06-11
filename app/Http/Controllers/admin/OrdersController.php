<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $res = DB::table('orders')->select(DB::raw('*,oid'))->orderBy('oid','desc')->paginate($request->input('num',5));

        $data = DB::table('orders')->where('receiver','like','%'.$request->input('search').'%')->get();

        $num = $request->input('num');
        $search = $request->input('search');

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.orders.index',[
            'title'=>'订单管理',
            'num'=>$num,
            'res'=>$res,
            'search'=>$search,
            'uid'=>$uid,
            'uname'=>$uname
            ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($oid)
    {
        $res = DB::table('orders_detail')->where('oid',$oid)->get();

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
        // dd($res);
        return view('admin.orders.detail',[
            'title'=>'',
            'res'=>$res,
            'oid'=>$oid,
            'uid'=>$uid,
            'uname'=>$uname
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($oid)
    {
        $res = DB::table('orders')->where('oid',$oid)->first();

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        // dd($ree);
        return view('admin.orders.edit',[
            'title'=>'订单修改',
            'oid'=>$oid,
            'res'=>$res,
            'uid'=>$uid,
            'uname'=>$uname
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $oid)
    {
        $res = $request->except('_token','_method');
        $date = DB::table('orders')->where('oid',$oid)->update($res);

        return redirect('admin/order');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($oid)
    {
        $res = DB::table('orders')->where('oid',$oid)->first();
        $row = DB::table('orders')->where('oid',$oid)->delete();
        // dd($res);
        return redirect('admin/order');
    }

}
