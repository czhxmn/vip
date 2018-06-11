<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use foreachPrintfArr;
class dizhiController extends Controller
{
     public function index(){
        


        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();
        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
        $res = DB::table('user_addr')->where('uid',$uid)->first();
        return view('home.dizhi',[
            'res'=>$res,
            'ids'=>$ids,
            'pids'=>$pids,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname
        ]);
    }

    public function create()
    {
        return view('hoome.dizhi');
    }

    public function store(Request $request)
    {

        $res = $request->except('_token');
        $uid = Session::get('uid');
        $data = DB::table('user_addr')->insert($res);

        if($data){
            return redirect('home/dizhi');
        }else{
            return back();
        }

    }

    public function mydizhi()
    {


        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $uid = Session::get('uid');
        $links = DB::table('links')->where('status','1')->get();
        
        $uname = DB::table('user')->where('uid',$uid)->first();






        $info = DB::table('user_addr')->where('uid',$uid)->get();

        return view('home.mydizhi',[
            'info'=>$info,
            'pids'=>$pids,
            'ids'=>$ids,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname 
        ]);
    }

    public function scdizhi($id)
    {

        $res = DB::table('user_addr')->where('id',$id)->delete();



        if ($res) {
            return back();
         } 
           
        
    }




}
