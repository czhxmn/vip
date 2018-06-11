<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use foreachPrintfArr;
use Session;
 
class IndexController extends Controller
{
    public function index(){

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

        // 导航
        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
       
        
        //vip商品
        $vipg = DB::table('goods')->where([
            ['status','1'],
            ['level','1']
        ])->get();

        // 广告(王国龙)
        $adver = DB::table('adver')->where('status','1')->take(3)->get();



         $ras = DB::table('wheel')->where('status','1')->take(5)->get();

       
       
       
       // 返回值
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

    public function show(){
        // 模板类别
        $res = DB::table('cates')->
        select(DB::raw('*,concat(path,cid) as paths'))->
        where('pid','0')->
        orderBy('paths')->get();
        
        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);

       
        return view('layout.home',[
            'pids'=>$pids,
            'ids'=>$ids,
        ]);
    }


    public static function getCateTree($pid)
    {
        $cates = DB::table('cates')->where('pid',$pid)->get();
        $sub = [];
        foreach($cates as $k=>$v){
            $v->sub = self::getCateTree($v->cid);
            $sub[] = $v;
           
        }
        return $sub;

    }

    /*public function list(){
        // 继承模板类别
        $res = DB::table('cates')->
        select(DB::raw('*,concat(path,cid) as paths'))->
        where('pid','0')->
        orderBy('paths')->get();
        
        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
       
        return view('home.goods.list',[
            'pids'=>$pids,
            'ids'=>$ids,
        ]);
        
    }*/


    
    

}
