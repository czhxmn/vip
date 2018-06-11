<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use foreachPrintfArr;
class orderController extends Controller
{
   	public function order(Request $request)
   	{
        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();

     		$shuliang = $request->input('shuliang');
     		$zong = $request->input('zong');

         
        
        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
     
     		//通过uid查询购物车表
     		$res = DB::table('carts')->where([
          ['uid',$uid],
          ['status',1]
        ])->get();  
      
       
       $ocnt = count($res);
    
     		//通过uid查询收获地址表
     		$info = DB::table('user_addr')->where('uid',$uid)->get();

        //本来应该写在订单控制器中,写在这是因为要把结算页当做一个跳板,让订单控制器更容易获取到数据库需要的所有值
        $oid = date('Ymd', time()).rand(1000,9999);

        $otime = date('Y-m-d-H',time());

     		return view('home.order.order',[
     			'res'=>$res,
     			'info'=>$info,
     			'zong'=>$zong,
          'ocnt'=>$ocnt,
          'oid'=>$oid,
          'otime'=>$otime,
          'pids'=>$pids,
          'ids'=>$ids,
          'links'=>$links,
          'uid'=>$uid,
          'uname'=>$uname
     		]);
   	}

   	//地址修改页面
   	public function address($id)
   	{
        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();
        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
     

     		$res = DB::table('user_addr')->where('id',$id)->first();
        return view('home.order.address',[
          	'res'=>$res,
            'pids'=>$pids,
            'ids'=>$ids,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname

        ]);
    }

    //进行地址修改方法
    public function add(Request $request)
    {
    	$res = $request->except('_token','_method','submit');

    	$id = $request->input('id');

    	$info = DB::table('user_addr')->where('id',$id)->update($res);

    	if ($info == '1') {
    		return redirect('/home/order');
    	}else{
    		return back();
    	}

    }


    //添加地址页面
    public function tianjia()
    {

      $ids = IndexController::getCateTree(0);
      $pids = new foreachPrintfArr($ids);
      // 何锦彬
      $links = DB::table('links')->where('status','1')->get();
      $uid = Session::get('uid');
      $uname = DB::table('user')->where('uid',$uid)->first();
      return view('home.order.tianjia',[
        'uid'=>$uid,
        'pids'=>$pids,
        'ids'=>$ids,
        'links'=>$links,
        'uname'=>$uname
      ]);
    }


    //添加页面方法
    public function insert(Request $request)
    {
      $info = $request->except('_token','_method','submit');

      $res = DB::table('user_addr')->insert($info);

      if ($res) {
        return redirect('/home/order');
      }else{
        return back();
      }
    }
}
