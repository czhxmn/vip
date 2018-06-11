<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UserAjaxController extends Controller
{
    //
    public function uajax(Request $request)
    {
    	$id = $request->input('id');
    	$status = $request->input('status')?0:1;
        
    	$res = DB::table('user')->where('uid',$id)->update(['status'=>$status]);

    	if($res){
    		echo 1;
    	} else {
    		echo 0;
    	}
    }

    public function unajax(Request $request)
    {
        $name = $request->input('uname');
        
        
        $res = DB::table('user')->where('uname',$name)->first();


        if($res){
            echo 1;
        } else {
            echo 0;
        }
    }
}
