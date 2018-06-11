<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Hash;
use Session;
use DB;
use foreachPrintfArr;

class LoginController extends Controller
{
    public function login()
    {
        return view('home.login',["title"=>"用户登录"]);
    }

    public function doLogin(Request $request)
    {
        $res = $request->input('uname');

        $data = DB::table('user')->where('uname',$res)->first();

        if(!$data){

            return back();

        }

        $pass = $request->input('upwd');

        if(!Hash::check($pass,$data->upwd)){

            return back()->with('err','用户名或者密码错误!!!');
        }

        session(['uid'=>$data->uid]);

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

        return view('home.index',[
            'pids'=>$pids,
            'ids'=>$ids,
            'res'=>$res,
            'links'=>$links,
            'sales'=>$sales,
            'uname'=>$uname,
            'vipg'=>$vipg,
            'adver'=>$adver,
            'ras'=>$ras
        ]);
    }

    public function signout(Request $request)
    {
        $request->session()->forget('uid');

        return redirect('home/login');
    }
}
