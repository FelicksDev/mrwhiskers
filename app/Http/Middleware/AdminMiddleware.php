<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
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
    /*     if (Auth::guest()){
            if($request->ajax()||$request->wantsJson()){
                return response('Unauthorized',401);
            }else{
                return redirect()->guest('login');
            }
        }
        return $next($request); */
        if (Auth::check()){
            //dd(Auth::check());
            return $next($request);
        }
        return redirect()->route('user.getLogin')->withErrors("Debe iniciar sesion");
    }
}
