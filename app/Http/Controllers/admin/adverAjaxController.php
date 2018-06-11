<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Support\Facades\Cache;

use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests\FormRequest;
use App\Http\Requests\FormUpdate;
  
use Session;  

class adverAjaxController extends Controller
{
    

    public function ajax(Request $request)
    {


    	$id = $request->input('id');
    	$status = $request->input('status')?0:1;
	
		$res = DB::table('adver')->where('id',$id)->update(['status'=>$status]);
		

    	if ($res) {
    		echo 1;
    	} else {
    		echo 0;
    	}
    	
    }

    public function delete(Request $request)
    {
    	$id = $request->input('id');
        
        $res = DB::table('adver')->where('id',$id)->delete();

        if ($res) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
