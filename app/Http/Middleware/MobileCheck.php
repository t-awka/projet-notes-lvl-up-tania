<?php

namespace App\Http\Middleware;

use Illuminate\Support\Str;
use Closure;
use Illuminate\Http\Request;

class MobileCheck
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
        if(Str::contains(request()->userAgent(), 'Mobile')){
            return redirect()->back();
        } else {
            return $next($request);
        }
    }
}
