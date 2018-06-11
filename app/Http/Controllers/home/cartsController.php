<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use foreachPrintfArr;
class cartsController extends Controller
{
    public function index()
    {
    	//合完项目需要变uid的获取
    	 $uid = Session::get('uid');

        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();
    	//查询购物车(等到合完项目需要在where条件里面加一个uid的条件)
    	$res = DB::table('carts')->where([
    		['jiesuan',0],
    		['uid',$uid]
    	])->get();


        $uname = DB::table('user')->where('uid',$uid)->first();

    	
		
		

    	
     	 return view('home.cart.carts',[
	        	'res'=>$res,
                'pids'=>$pids,
                'ids'=>$ids,
                'links'=>$links,
                'uid'=>$uid,
                'uname'=>$uname
	        	
	        ]);
	}


	public function ajax(Request $request)
	{
		$id = $request->input('id');

    	$res = DB::table('carts')->where('id',$id)->delete();

    	$arr = DB::table('carts')->count();

    	echo $arr;
    	
	}

	public function number(Request $request)
	{
		$xiaoji = $request->input('xiaoji');

		$id = $request->input('id');


		$res = DB::table('carts')->where('id',$id)->update(['xiaoji'=>$xiaoji]);
		

		if ($res) {
			echo 1;
		}else{
			echo 2;
		}

	}


	public function CartStatus(Request $request)
	{
		$id = $request->input('id');
		$status = $request->input('status');
		$res = DB::table('carts')->where('id',$id)->update(['status'=>$status]);

		
	}

	public function shoucangAjax(Request $request)
	{
		$gid = $request->input('gid');
		 $uid = Session::get('uid');
		


		$res = DB::table('collect')->insert([
			'gid' => $gid,
			'uid' => $uid
		]);

		if ($res) {
			echo 1;			
		}else{
			echo 0;
		}
	}

}
