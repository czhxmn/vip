<?php

namespace App\Http\Middleware;
use Closure;
use DB;
use Session;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $uid = Session::get('uid');

        $auth = DB::table('user')->where('uid',$uid)->first();

        if (session('uid') && ($auth->auth == 1 || $auth->auth == 2) && ($auth->status == 1)) {
            
            return $next($request);
                
        } else{

            return redirect('admin/login');
               
        }
    }
}
