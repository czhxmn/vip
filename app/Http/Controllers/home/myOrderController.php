<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use DB;
use Session;
use foreachPrintfArr;


class myOrderController extends Controller
{
    public function index(Request $request)
    {
        // 获取缓存数据
        $uid = Session::get('uid');
        // 通过用户名获取订单号
        $r = DB::table('orders')->where('uid',$uid)->get();
        // 导航
        $uname = DB::table('user')->where('uid',$uid)->first();
        // 继承模板类别(刘小婧)
        $res = DB::table('cates')->
        leftJoin('cates_img','cates.cid','=','cates_img.cid')->
        select(DB::raw('*,concat(path,cates.cid) as paths'))->
        where('cates.pid','0')->
        orderBy('paths')->get();

        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();

         //促销商品
        $sales = DB::table('goods')->where([
            ['status','1'],
            ['level','2']
        ])->get();

        //vip商品
        $vipg = DB::table('goods')->where([
            ['status','1'],
            ['level','1']
        ])->get();

        // 广告(王国龙)
        $adver = DB::table('adver')->where('status','1')->take(3)->get();
        
        $ras = DB::table('wheel')->where('status','1')->take(5)->get();

        return view('home.myorder',[
                    'title'=>'我的订单',
                    'res'=>$res,
                    'r'=>$r,
                    'uname'=>$uname,
                    'pids'=>$pids,
                    'ids'=>$ids,
                    'links'=>$links,
                    'sales'=>$sales,
                    'vipg'=>$vipg,
                    'adver'=>$adver,
                    'ras'=>$ras
                ]);
    }

    public function detail($oid)
    {
        $r = DB::table('orders_detail')->where('oid',$oid)->get();
        // 导航
        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
        // 继承模板类别(刘小婧)
        $res = DB::table('cates')->
        leftJoin('cates_img','cates.cid','=','cates_img.cid')->
        select(DB::raw('*,concat(path,cates.cid) as paths'))->
        where('cates.pid','0')->
        orderBy('paths')->get();

        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();

         //促销商品
        $sales = DB::table('goods')->where([
            ['status','1'],
            ['level','2']
        ])->get();

        //vip商品
        $vipg = DB::table('goods')->where([
            ['status','1'],
            ['level','1']
        ])->get();

        // 广告(王国龙)
        $adver = DB::table('adver')->where('status','1')->take(3)->get();
        
        $ras = DB::table('wheel')->where('status','1')->take(5)->get();

        return view('home.orderdetail',[
                    'title'=>'订单详情',
                    'r'=>$r,
                    'oid'=>$oid,
                    'res'=>$res,
                    'uname'=>$uname,
                    'pids'=>$pids,
                    'ids'=>$ids,
                    'links'=>$links,
                    'sales'=>$sales,
                    'vipg'=>$vipg,
                    'adver'=>$adver,
                    'ras'=>$ras
                ]);
    }

    public function update(Request $request,$oid)
    {
        $status = '3';

        $res = DB::table('orders')->where('oid',$oid)->update(['status'=>$status]);
        // dd($res);
        return redirect('home/myorder');
    }

    public function destroy($oid)
    {
        $res = DB::table('orders')->where('oid',$oid)->delete();
        return redirect('home/myorder');
    }
}
