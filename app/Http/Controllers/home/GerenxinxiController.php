<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use foreachPrintfArr;

class GerenxinxiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uid = Session::get('uid');
        $res = DB::table('user')->where('uid',$uid)->first();

        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();
        
        $uname = DB::table('user')->where('uid',$uid)->first();
        return view('home.yonghuxiugai',[
            'res'=>$res,
            'pids'=>$pids,
            'ids'=>$ids,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname 
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
          $uid = Session::get('uid');
        $res = DB::table('user')->where('uid',$uid)->first();

        $ids = IndexController::getCateTree(0);
        $pids = new foreachPrintfArr($ids);
        // 何锦彬
        $links = DB::table('links')->where('status','1')->get();
        
        $uname = DB::table('user')->where('uid',$uid)->first();
        return view('home.yonghuxiugai',[
            'res'=>$res,
            'pids'=>$pids,
            'ids'=>$ids,
            'links'=>$links,
            'uid'=>$uid,
            'uname'=>$uname 
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        
        $this->validate($request, [

                'pic' => 'required'
                ],[
                'pic.required' => '图片不能为空'
                ]);

        if($request->hasFile('pic')){

            //文件名
            $name = rand(1111,9999).'_'.time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./user/images/', $name.'.'.$suffix);

        }

        $res = $request->except('_token','_method','aliasName');

         $res['pic'] = '/user/images/'.$name.'.'.$suffix;

        $data = DB::table('user')->where('uid',$id)->update($res);

        if($data){
            return redirect('home/gerenxinxi');
        }else{
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
