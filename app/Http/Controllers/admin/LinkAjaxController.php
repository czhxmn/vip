<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LinkAjaxController extends Controller
{
    //
    public function lajax(Request $request)
    {
    	$id = $request->input('id');
    	$status = $request->input('status')?0:1;
        
    	$res = DB::table('links')->where('id',$id)->update(['status'=>$status]);

    	if($res){
    		echo 1;
    	} else {
    		echo 0;
    	}
    }

    public function forms(Request $request)
    {
        return view('test.form');
    }
    public function tests(Request $request)
    {
        $res = $request->input('times');
        dd($res);
        // $a = strtotime($res);
        // dd($a);
        
    }
}
