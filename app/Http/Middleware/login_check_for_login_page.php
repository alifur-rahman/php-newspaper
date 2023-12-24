<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class login_check_for_login_page
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if($request->session()->has('single_user')){
            return redirect('/admin');
        }
        else{
            return $next($request);
        }
    }
}
