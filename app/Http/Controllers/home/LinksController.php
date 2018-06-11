<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class LinksController extends Controller
{
	public function links(){
	    //获取数据
	    $links = DB::table('links')->where('status','1')->get();
	    // dd($links);
	    return view('layout.home',[
	    	'links'=>$links
	    ]);
	}
}
