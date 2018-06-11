<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use DB;
 


class CatesController extends Controller
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
        orderBy('paths')->
        where('cname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',10));

        $num = $request->input('num');

        $search = $request->input('search');

        $uid = Session::get('uid');

        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.cates.index',[
                'res'=>$res,
                'num'=>$num,
                'search'=>$search,
                'uid'=>$uid,
                'uname'=>$uname
        ]);

        $pids = DB::table('cates')->
        where('pid','0')->get();

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


        // $images = DB::table('cates')->
        // where('pid',0)->get();
       $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

      
        return view('admin.cates.add',[ 
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

        // 图片的存储
     

        if($request->hasFile('cimg')){

            // 文件名
            $name = rand(1111,9999).'_'.time();

            //获取后缀
            $suffix = $request->file('cimg')->getClientOriginalExtension();

            $request->file('cimg')->move('./home/goodss/upload/images/',$name.'.'.$suffix);
        }

         $imgs = $request->only('cimg');

        $imgs['cimg'] =  '/home/goodss/upload/images/'.$name.'.'.$suffix;

        
        $datas = DB::table('cates_img')->insert($imgs);

        


        //数据的存储
        $res = $request->except('_token','cimg');

        if($res['pid']=='0'){

            $res['path'] = '0,';
        } else {

            $data = DB::table('cates')->where('cid',$res['pid'])->first();


            $res['path'] = $data->path.$data->cid.',';

        }


        $data = DB::table('cates')->insert($res);

        // 隐藏
        

        if($data==1 and $datas==1){
            return redirect('admin/cate');
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
        $info = DB::table('cates')->where('cid',$id)->first();

        $res = DB::table('cates')->
        select(DB::raw('*,concat(path,cid) as paths'))->
        orderBy('paths')->
        get();


        foreach($res as $k => $v){
            //获取path路径
            $foo = explode(',',$v->path);
            $level  = count($foo)-2;

            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;',$level).'|--'.$v->cname;
        }

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.cates.edit',[
            
            'info'=>$info,
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



        $data = DB::table('cates')->where('cid',$id)->update($res);

        if($res){


            return redirect('/admin/cate')->with('msg','修改成功');

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
        //
        $res = DB::table('cates')->where('cid',$id)->first();

        $path = $res->path.$res->cid;  //0,2,7

        // 如果有子类不能删除
        $cate = DB::table('cates')->where('pid',$id)->first();


        if($cate){
            return back()->with('msg','请先删除此类下的子类!');
            
        }



        
        // 如果子类有商品不能删除

        $goods = DB::table('goods')->where('cid',$id)->first();

         if($goods){
            return back()->with('ms','请先删除此类下的商品!');
            
        }



        //删除本身

        $data = DB::table('cates')->where('cid',$id)->delete();

        if($data){

            return redirect('/admin/cate');
        } else{

            return back();
        }
        
    }
    public static function getTypeMessage($pid)
    {
        $res = DB::table('cates')->where('pid',$pid)->get();

        $sub_type = [];
        foreach($res as $k => $v){

            $v->type = self::getTypeMessage($v->cid);

            $sub_type[] = $v;
        }

        return $sub_type;

    }
}
