<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Seller
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



        if(Auth::guard('seller')->check())
        {
           // $guard == "admin" && Auth::guard($guard)->check()

            return $next($request);

         }
         else{
             return redirect()->route('seller.login.form')->with('error',"you dont have access here");
         }







     //   if(auth()->user()->role=='seller')
       // {

         //   return $next($request);
         //}else{
           //  return redirect()->route(auth()->user()->role->with('error',"you dont have access here"));
         //}
    }
}
