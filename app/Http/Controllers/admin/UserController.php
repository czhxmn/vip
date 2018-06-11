<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        //显示用户页面
         $res = DB::table('user')->
        where('uname','like','%'.$request->input('search').'%')->
        orderBy('uid','asc')->
        paginate($request->input('num',3));


        $num = $request->input('num');
        $search = $request->input('search');

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.user.index',[
                    'title'=>'用户的列表页',
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
        //显示用户添加页面
        return view('admin.user.add',[
                    'title'=>'用户管理页面',
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
            'uname' => 'required|unique:user|regex:/^\w{6,12}$/',
            'nickName' => 'regex:/^\w{4,12}$/',
            "upwd" => 'required|regex:/^\S{6,12}$/',
            'repass'=>'same:upwd',
            'email'=>'email',
            'phone'=>'required|regex:/^1[345678]\d{9}$/'

        ],[
            'uname.required'=>'名字不能为空',
            'uname.unique'=>'名字已存在',
            'uname.regex'=>'名字格式不正确',
            'nickName.regex'=>'昵称格式不正确',
            'upwd.required'=>'密码不能为空',
            'upwd.regex'=>'密码格式不正确',
            'repass.same'=>'两次密码不一致',
            'email.email'=>'邮箱格式不正确',
            'phone.required'=>'手机号不能为空',
            'phone.regex'=>'手机号码格式不正确'
        ]);

        // //数据存储
        $res = $request->except('_token','repass');
         $res['upwd'] = Hash::make($request->input('upwd'));
        
        $data = DB::table('user')->insert($res);
        if ($data)
        {
            return redirect('/admin/user');
        } else {
            return back();
        }

    }

    /** n
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
        //用户修改页面
        $res = DB::table('user')->where('uid',$id)->first();

        $uid = Session::get('uid');
        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.user.edit',[
            'title'=>'用户修改页面',
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
        //数据库修改数据
        $res = $request->except('_token','_method');
        // dd($res);
        $data = DB::table('user')->where('uid',$id)->update($res);
        if($data){
            return redirect('/admin/user');
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
        //删除
        $res = DB::table('user')->where('uid',$id)->delete();
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
