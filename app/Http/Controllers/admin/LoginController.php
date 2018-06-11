<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//引用对应的命名空间
use Gregwar\Captcha\CaptchaBuilder;
use Session;

use DB;
use Hash;

class LoginController extends Controller
{
    public function login(){
        return view('admin.login.login',['title'=>'后台的登录页面']);
    }

    //生成验证码方法
    public function captcha($tmp) {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 250, $height = 70, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('code', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }


    public function doLogin(Request $request)
    {
        // dd($request->all());
        if(Session::get('code') != $request->input('code')){

            return back()->with('msg','验证码有误');
        }

        $res = $request->except('code','_token');

        $data = DB::table('user')->where('uname',$res)->first();

        if(!$data){

            return back();

        }

        $pass = $request->input('upwd');

        if(!Hash::check($pass,$data->upwd)){

            return back()->with('err','用户名或者密码错误!!!');
        }

        session(['uid'=>$data->uid]);
        $status = $data->status;
        $auth = $data->auth;
        if ($auth==2 || $auth==1) {
            // return redirect('admin/index');
            if($status == 1){
                return redirect('admin/index');
            } else {
                return back()->with('mssg','您已被禁用,无法登录');
            }
        } else {
            return back()->with('msg','没有权限,禁止登录');
        }
       
       

        
    }

    public function signout(Request $request)
    {
        $request->session()->forget('uid');

        return redirect('admin/login');
    }

}
