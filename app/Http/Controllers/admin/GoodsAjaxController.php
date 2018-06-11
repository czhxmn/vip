<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

use Illuminate\Support\Facades\Cache;

use Gregwar\Captcha\CaptchaBuilder;
use App\Http\Requests\FormRequest;
use App\Http\Requests\FormUpdate;

class GoodsAjaxController extends Controller
{
    public function GoodsAjax(Request $request)
    {
        $id = $request->input('id');
        $status = $request->input('status');
        if ($status == 0 ) {
            $status = 1;
        }else if($status == 1){
            $status = 2;
        }else if($status == 2) {
            $status = 1;
        }
        
        $res = DB::table('goods')->where('gid',$id)->update(['status'=>$status]);

        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
    }

    public function delete(Request $request)
    {
        
        $gid = $request->input('gid');
        
        $res = DB::table('goods')->where('gid',$gid)->delete();


        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
