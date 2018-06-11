<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){


    return redirect('/home/index');
});

    //登陆
    Route::get('admin/login','admin\LoginController@login');
    Route::post('admin/dologin','admin\LoginController@doLogin');
    Route::get('admin/signout','admin\LoginController@signout');
    Route::get('code/captcha/{id}','admin\LoginController@captcha');


// 后台
Route::group(['middleware'=>'login'],function()
{

    // 首页
    Route::get('admin/index','admin\IndexController@index');
    // 用户
    Route::resource('admin/user','admin\UserController');
    Route::get('admin/userajax','admin\UserAjaxController@uajax');
    Route::get('admin/unajax','admin\UserAjaxController@unajax');
    // 分类
    Route::resource('admin/cate','admin\CatesController');
    // 商品
    Route::resource('admin/good','admin\GoodsController');
    Route::get('admin/goodAjax','admin\GoodsAjaxController@GoodsAjax');
    Route::post('admin/good/delete','admin\GoodsAjaxController@delete');
    // 广告
    Route::resource('admin/adver','admin\adverController');
    Route::post('admin/adver/ajax','admin\adverAjaxController@ajax');
    Route::post('admin/adver/delete','admin\adverAjaxController@delete');
    // 评论管理
    Route::get('admin/eval','admin\evalController@index');
    Route::get('admin/evalajax','admin\evalController@ajax');
    Route::get('admin/pinglun/{id}/{gid}','admin\evalController@pinglun');
    // 友情链接
    Route::resource('admin/links','admin\LinkController');
    Route::get('admin/linkajax','admin\LinkAjaxController@lajax');
    // 轮播
    Route::resource('admin/carouses','admin\CarousesController');
    Route::get('admin/carousesajax','admin\CarousesAjaxController@cajax');

    // 订单
    Route::resource('admin/order','admin\OrdersController');
    Route::get('admin/orders','admin\OrderXController@update'); 
});




// 登录
Route::get('home/login','home\LoginController@login');
Route::get('home/dologin','home\LoginController@doLogin');
// 注册
Route::get('home/signup','home\SignupController@signup');
Route::get('home/dosignup','home\SignupController@dosignup');
Route::get('home/captcha','home\SignupController@captcha');
// 退出
Route::get('home/signout','home\LoginController@signout');


// 首页
Route::get('home/index','home\IndexController@index');
Route::get('home/show','home\IndexController@show');
Route::get('home/user','home\IndexController@user');
// 列表页
Route::get('home/list/{cid}','home\GoodsController@list');
Route::get('home/cuxiao/{cid}','home\GoodsController@cuxiao');
// 详情页
Route::get('home/detail/{gid}','home\GoodsController@detail');

// 前台
Route::group(['middleware'=>'sign'],function()
{
    //详情页加入购物车
    Route::get('home/cartsAjax/{gid}','home\GoodsController@cartsAjax');
        // 购物车
    Route::get('home/carts','home\cartsController@index');
    Route::get('home/ajax','home\cartsController@ajax');
    Route::get('home/number','home\cartsController@number');
    Route::get('home/CartStatus','home\cartsController@CartStatus');
    //添加至收藏
    Route::get('/home/shoucangAjax','home\cartsController@shoucangAjax');
    //确认订单信息
    Route::get('home/order','home\orderController@order');
    //修改地址提交的方法
    Route::post('home/add','home\orderController@add');
    //添加地址页面
    Route::get('home/tianjia','home\orderController@tianjia');
    //添加地址方法
    Route::get('home/insert','home\orderController@insert');
    //修改地址页面
    Route::get('home/address/{id}','home\orderController@address');
    //成功提交订单
    Route::get('home/paysce','home\paysceController@paysce');

    // 友情链接
    Route::get('home/links','home\LinksController@links');

    //用户信息
    Route::resource('home/gerenxinxi','home\GerenxinxiController');

    //地址
    Route::get('home/store','home\dizhiController@store');
    Route::get('home/dizhi','home\dizhiController@index');
    Route::get('home/mydizhi','home\dizhiController@mydizhi');
    Route::get('home/scdizhi/{id}','home\dizhiController@scdizhi');

   

    //收藏
    Route::resource('home/shoucang','home\ShoucangController');


    //评论
    Route::get('home/pingq/{gid}','home\PingController@index');
    Route::post('home/pingl','home\PingController@insert');

    
    //个人中心评论
    Route::get('home/mycomment','home\MycommentController@index');
    Route::get('home/scpl/{gid}','home\MycommentController@destroy');
    
    // 我的订单
    Route::get('home/myorder','home\myOrderController@index');
        // 详情
    Route::get('home/orderdet/{oid}','home\myOrderController@detail');
        // 修改
    Route::get('home/update/{oid}','home\myOrderController@update');
    Route::get('home/destroy/{oid}','home\myOrderController@destroy');

});
