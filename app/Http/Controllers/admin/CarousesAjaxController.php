<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class CarousesAjaxController extends Controller
{
    public function cajax(Request $request)
    {
        $id = $request->input('id');

        $status = $request->input('status')?0:1;

        $res = DB::table('wheel')->where('id',$id)->update(['status'=>$status]);


        if($res){

            echo 1;

        } else {

            echo 0;
            
        }
    }
}
