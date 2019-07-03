<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // 操作方法
    public function handle($request, Closure $next)
    {
        //检测当前 是否有登录的SESSION信息
        if ($request->session()->has('id')) {
            //执行后台访问模板的操作
            return $next($request);
        }else{
            //如果不就跳转到登录页面
            return redirect("/adminlogin");
        }
       
    }
}
