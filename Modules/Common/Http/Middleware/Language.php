<?php

namespace Modules\Common\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (session()->has('lang')){
            //dd(session('lang'));
            app()->setLocale(session('lang'));
        }else{
            app()->setLocale('ar');
        }

        return $next($request);
    }
}
