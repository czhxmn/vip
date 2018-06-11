<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use foreachPrintfArr;
class PingController extends Controller
{
    public function index($gid)
    {   $uid = Session::get('uid');
        $res = DB::table('user')->where('uid',$uid)->first();
        $ggs = DB::table('goods')->where('gid',$gid)->first();
        // dd($ggs);
        $times = date("Y-m-d H:i",time());
         $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();


        
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('home.pinglun',[
            'title'=>'商品评价',
            'res'=>$res,
            'ggs'=>$ggs,
            'times'=>$times,
            'pids'=>$pids,
            'ids'=>$ids,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname
            ]);
    }

    public function insert(Request $request)
    {

        $res = $request->except('_token');

        $data = DB::table('eval')->insert($res);

        if($data){
            return redirect('home/gerenxinxi');
        } else {
            return back();
        }

    }
}
