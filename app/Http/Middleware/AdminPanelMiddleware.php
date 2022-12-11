<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminPanelMiddleware
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
        //хелпер auth() из БД вытягивает пользователя который в данный момент с  данного устройства заходит на сайт
        
        //dd(auth()->id());
        if(auth()->user()->role !== 'admin'){
            return redirect()->route('refusal');
        };
        return $next($request);
    }
}
