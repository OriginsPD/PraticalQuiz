<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoles
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

//        if(auth()->user()->usertype === 1 ){
//            return redirect()->route('admin.dashboard');
//        }
//        if(auth()->user()->usertype === 2 ){
//            return redirect()->route('teacher.dashboard');
//        }
//        if(auth()->user()->usertype === 3 ){
//            return redirect()->route('student.dashboard');
//        }

        return $next($request);
    }
}
