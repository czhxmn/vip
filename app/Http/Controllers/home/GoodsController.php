<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

use foreachPrintfArr;

class GoodsController extends Controller
{
    // 列表
    public function list(Request $request,$cid)
    {

        // 继承模板
       // $req = $res = $request->except('_token');
        
        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
       //获取
        


        $data = DB::table('goods')->
        leftJoin('cates','goods.cid','=','cates.cid')->
        where([
                    ['goods.cid',$cid],
                    ['goods.level','0'],

        ])->
        orWhere([
                    ['cates.pid',$cid],
                    ['goods.level','0'],
                    ['goods.status',1],

                    
                ])->
         get();

       
        // 获取价格
        // $prices = DB::table('goods')->
        // whereBetween('price',$info)->get();
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
        

        // 返回值
        return view('home.goods.list',[
            'pids'=>$pids,
            'ids'=>$ids,
            'data'=>$data,
            'cid'=>$cid,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname
            // 'price'=>$price
            
       
        ]);
    }

    // 促销
    public function cuxiao($id)
    {
        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);

        $level = DB::table('goods')->
        where('level',$id)->
        get();
        // $pirces = DB::table('goods')->
        // where('price',$price)->get();
         // 何锦彬
        $links = DB::table('links')->where('status','1')->get();
        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
        return view('home.goods.cuxiao',[
            'links'=>$links,
            'id'=>$id,
            'level'=>$level,
            'pids'=>$pids,
            'ids'=>$ids,
            'uid'=>$uid,
            'uname'=>$uname 
           
            ]); 
    }

    // 详情
    public function detail($gid)
    {

        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();
        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);

        $res = DB::table('goods')->
        where('gid',$gid)->
        first();

        $eval = DB::table('eval')->where('gid',$gid)->where('status',1)->get();
        
        $long = count($eval);



        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
     

        return view('home.goods.detail',[
                    'links'=>$links,
                    'pids'=>$pids,
                    'ids'=>$ids,
                    'res'=>$res,
                    'eval'=>$eval,
                    'long'=>$long,
                    'uid'=>$uid,
                    'uname'=>$uname
            ]);
    }
    
   public function cartsAjax($gid)
   {
        //通过gid和uid去购物车表中查是否有这条数据,如果有的话就不进行插入
        $uid = Session::get('uid');
        $carts = DB::table('carts')->where([
            ['gid',$gid],
            ['uid',$uid]

        ])->first();
        
        if (!$carts) {
            $goods = DB::table('goods')->where('gid',$gid)->first();

            
            

             //定义$info数组
            $info = [];
            //遍历获取到的数据
            foreach ($goods as $k => $v) {
                $info['gname'] = $goods->gname;
                $info['price'] = $goods->price;
                $info['gid'] = $goods->gid;
                $info['uid'] = $uid;
                $info['stock'] = $goods->stock;
                $info['gpic'] = $goods->gpic;
            }
            // dd($info);

            $res = DB::table('carts')->insert($info);

        
            if ($res) {
                
                return back()->with('msg','添加购物车成功!');
            }
        }else{
            return back()->with('msg','购物车中已经有了这件商品');
        }
        

        
   }
}
