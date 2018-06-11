<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;

class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $res = DB::table('cates')->
        select(DB::raw('*,concat(path,cid) as paths'))->
        orderBy('paths')->get();

        $data = DB::table('goods')->
        where('gname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',3));

        $num = $request->input('num');
        $search = $request->input('search');
     
        foreach($res as $k => $v){
            //获取path路径
            $pat = explode(',',$v->path);
            $level  = count($pat)-1;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;',$level).'|--'.$v->cname;
        }

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.goods.index',[

            'res'=>$res,
            'data'=>$data,
            'num'=>$num,
            'search'=>$search,
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
        $res = DB::table('cates')->
        select(DB::raw('*,concat(path,cid) as paths'))->
        orderBy('paths')->
        get();
        foreach($res as $k => $v){
            //获取path路径
            $pat = explode(',',$v->path);
            $level  = count($pat)-1;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;',$level).'|--'.$v->cname;
        }

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.goods.add',[
            'res'=>$res,
            'uid'=>$uid,
            'uname'=>$uname
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    

        if($request->hasFile('gpic')){

            //文件名
            $name = rand(1111,9999).'_'.time();

            //获取后缀
            $suffix = $request->file('gpic')->getClientOriginalExtension();

            $request->file('gpic')->move('./admin/goodss/upload/image/',$name.'.'.$suffix);

            
        }

        
        $ctime = strtotime($request->input('time'));
        
        $res = $request->except('_token','time');
        
        $res['gpic'] = '/admin/goodss/upload/image/'.$name.'.'.$suffix;
 
        $res['ctime'] = $ctime;
        
        $data = DB::table('goods')->insert($res);


        if($data){
            return redirect('/admin/good');
        }else{
            return back();
        }
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
    public function edit($id)
    {
        $res = DB::table('goods')->where('gid',$id)->first();

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.goods.edit',[

            'res'=>$res,
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
         $res = $request->except('_token','_method');

         $data = DB::table('goods')->where('gid',$id)->update($res);
        if($data){
            return redirect('/admin/good');
        } else {
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
      

       
    }
}
