<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use foreachPrintfArr;
use Session;

class MycommentController extends Controller
{
    public function index(){
   
        

        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();



        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
        $res = DB::table('eval')->leftJoin('goods','eval.gid','=','goods.gid')->where('uid',$uid)->get();

        return view('home.mycomment',[
            'res'=>$res,
            'pids'=>$pids,
            'ids'=>$ids,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname
            ]);
    }

    public function destroy($id)
    {

        $res = DB::table('eval')->where('gid',$id)->delete();

        if ($res) {
            return redirect('/home/mycomment');
         } else {
            return back();
        }

    }
}
