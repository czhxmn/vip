<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Gregwar\Captcha\CaptchaBuilder;
use DB;
use Hash;
use Session;

class SignupController extends Controller
{
    public function signup()
    {
        return view('home.signup',['title'=>'用户注册']);
    }

    //生成验证码方法
    public function captcha()
    {
        //生成验证码图片的Builder对象，配置相应属性
        $builder = new CaptchaBuilder;
        //可以设置图片宽高及字体
        $builder->build($width = 250, $height = 70, $font = null);
        //获取验证码的内容
        $phrase = $builder->getPhrase();
        //把内容存入session
        Session::flash('captcha', $phrase);
        //生成图片
        header("Cache-Control: no-cache, must-revalidate");
        header('Content-Type: image/jpeg');
        $builder->output();
    }

    // 表单验证
    public function dosignup(Request $request)
    {
        // 验证表单信息
        $this->validate($request,[
                'uname' => 'required|unique:user|regex:/^\w{6,12}$/',
                'email' => 'regex:/^[a-zA-Z0-9_.-]+@[a-zA-Z0-9-]+(\.[a-zA-Z0-9-]+)*\.[a-zA-Z0-9]{2,6}$/',
                'upwd' => 'required|regex:/^\S{6,12}$/',
                'reupwd'=>'same:upwd',
                'email'=>'email',
                'phone'=>'required|regex:/^1[3456789]\d{9}$/'
            ],[
                'uname.required'=>'名字不能为空',
                'uname.unique'=>'用户名已经存在',
                'uname.regex'=>'名字格式不正确',
                'upwd.required'=>'密码不能为空',
                'upwd.regex'=>'密码格式不正确',
                'reupwd.same'=>'两次密码不一致',
                'email.email'=>'邮箱格式不正确',
                'phone.required'=>'手机号不能为空',
                'phone.regex'=>'手机号码格式不正确'
            ]);

         // 验证码
        if(Session::get('captcha') != $request->input('captcha')){

            return back()->with('msg','验证码有误');

        }

        $res = $request->except('captcha','_token','reupwd');
         $res['upwd'] = Hash::make($request->input('upwd'));

        $data = DB::table('user')->insert($res);

        if ($data) {
                return redirect('home/login');
            } else {
                return back();
            }
    }

}