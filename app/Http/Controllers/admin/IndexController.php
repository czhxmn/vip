<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;

class IndexController extends Controller
{
    //测试
    public function index(){
    	$uid = Session::get('uid');
    	$uname = DB::table('user')->where('uid',$uid)->first();
        return view('admin.index',[
        			'uid'=>$uid,
        			'uname'=>$uname
        		]);
    }
}
 
