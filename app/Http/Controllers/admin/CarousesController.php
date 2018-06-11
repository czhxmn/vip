<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Session;
use App\Http\Requests\FormRequest;
use App\Http\Requests\FormUpdate;

class CarousesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $arr = $request->all();

        $res = DB::table('wheel')->
        where('wname','like','%'.$request->input('search').'%')->
        orderBy('id','asc')->
        paginate($request->input('num',2));

        $num = $request->input('num');

        $search = $request->input('search');

        $uid = Session::get('uid');

        $uname = DB::table('user')->where('uid',$uid)->first();

        return view('admin.wheel.index',[
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

        return view('admin.wheel.add',[
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
            $this->validate($request, [
                'wname' => 'required',
                'pic' => 'required',
                'pid' => 'required',
                'status' => 'required'
                ],[
                'wname.required' => '标题不能为空',
                'pic.required' => '图片不能为空',
                'pid.required' => '链接不能为空',
                'status.required' => '请选择状态'
                ]);
           if($request->hasFile('pic')){

            //文件名
            $name = rand(1111,9999).'_'.time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./wheel/images/', $name.'.'.$suffix);

        }

        $res = $request->except('_token');

        $res['pic'] = '/wheel/images/'.$name.'.'.$suffix;

        $data = DB::table('wheel')->insert($res);

        if($data){

            return redirect('admin/carouses');

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
        //  $res = DB::table('wheel')->find($id);
        // return view('admin.wheel.index',compact('res'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $res = DB::table('wheel')->where('id',$id)->first();

        $uid = Session::get('uid');

        $uname = DB::table('user')->where('uid',$uid)->first();
        
        return view('admin.wheel.edit',[
            'uid'=>$uid,
            'uname'=>$uname

            ],compact('res'));


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
                'wname' => 'required',
                'pic' => 'required',
                'pid' => 'required'
                ],[

                'wname.required' => '标题不能为空',
                'pic.required' => '图片不能为空',
                'pid.required' => '链接不能为空'
                ]);

        if($request->hasFile('pic')){

            //文件名
            $name = rand(1111,9999).'_'.time();

            //获取后缀
            $suffix = $request->file('pic')->getClientOriginalExtension();

            $request->file('pic')->move('./wheel/images/',$name.'.'.$suffix);

        }

        $res = $request->except('_token','_method');

        $res['pic'] = '/wheel/images/'.$name.'.'.$suffix;

        $data = DB::table('wheel')->where('id',$id)-> update($res);

        if($data){

            return redirect('admin/carouses');

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

        $res = DB::table('wheel')->where('id',$id)->delete();



        if ($res) {

            return redirect('/admin/carouses');

         } else {

            return back();
            
        }
    }




}
