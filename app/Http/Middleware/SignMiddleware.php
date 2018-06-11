<?php

namespace App\Http\Middleware;
use Closure;

class SignMiddleware
{
/**
 * @Author: Marte
 * @Date:   2018-05-29 17:25:08
 * @Last Modified by:   Marte
 * @Last Modified time: 2018-05-29 17:26:46
 */
    public function handle($request, Closure $next)
        {
            if (session('uid')) {

                return $next($request);
            } else {

                return redirect('home/login');
            }
        }
}
