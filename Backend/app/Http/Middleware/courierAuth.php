<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class courierAuth
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
        if(session()->has('logged.courier'))
        {
            return $next($request);
        }
        else
        {
            session()->flash('msg',"You are not logged in!");
            return redirect()->route('user.login');
        }
    }
}
