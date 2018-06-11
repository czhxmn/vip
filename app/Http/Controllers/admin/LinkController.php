<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Session;
use App\Http\Requests\FormRequest;
use App\Http\Requests\FormUpdate;
class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //获取数据
        $res = DB::table('links')->where('linkname','like','%'.$request->input('search').'%')->
        orderBy('id','asc')->
        paginate($request->input('num',2));
        $num = $request->input('num');
        $search = $request->input('search');

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        //显示友情链接页面
        return view('admin.links.index',[
            'title'=>'友情链接显示页面',
            'res'=>$res,
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
        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.links.add',[
            'title'=>'友情链接添加页面',
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
        //表单验证
        $this->validate($request, [
            'linkname' => 'required',
            'logo' => 'required',
            'url' => 'required|regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'
        ],[
            'linkname.required' => '链接标题不能为空',
            'logo.required' => '图片不能为空',
            'url.required' => '链接路径不能为空',
            'url.regex'=>'链接格式不正确'
        ]);
        

        
        //文件处理
        if($request->hasFile('logo')){

            //文件名
            $name = rand(1111,9999).'_'.time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension(); 

            //移动到哪去
            $request->file('logo')->move('./Uploads/links/', $name.'.'.$suffix);
        }
        $res = $request->except('_token');
        $res['logo'] = '/Uploads/links/'.$name.'.'.$suffix;
        $data = DB::table('links')->insert($res);
        if($data){
            return redirect('/admin/links');
        } else {
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
        //链接修改页面
        $res = DB::table('links')->where('id',$id)->first();

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();
        // dd($res);
        return view('admin.links.edit',[
            'title'=>'链接修改页面',
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
        $res = DB::table('links')->where('id',$id)->first();

        $data = '@'.unlink('.'.$res->logo);

        if(!$data){

            return back();

        }

        if($request->hasFile('logo')){

            //文件名
            $name = rand(1111,9999).'_'.time();

            //获取后缀
            $suffix = $request->file('logo')->getClientOriginalExtension(); 

            //移动到哪去
            $request->file('logo')->move('./Uploads/links/', $name.'.'.$suffix);
        }
        

        $res = $request->except('_token','_method');

         $res['logo'] = '/Uploads/links/'.$name.'.'.$suffix;

        $data = DB::table('links')->where('id',$id)->update($res);

        if($data){

            return redirect('/admin/links');

        }else{

            return back();

        }
        // //数据库修改数据
        // $res = $request->except('_token','_method');
        
        // $data = DB::table('links')->where('id',$id)->update($res);
        // if($data){
        //     return redirect('/admin/links');
        // } else {
        //     return back();
        // }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //删除
        $res = DB::table('links')->where('id',$id)->delete();
        if($res){
           $arr = [
                'status' => 1,
                'msg' => '删除成功'
           ];
        } else {
            $arr = [
                'status' => 0,
                'msg' => '删除失败'
           ];
        }

        return $arr;
    }
    
}
