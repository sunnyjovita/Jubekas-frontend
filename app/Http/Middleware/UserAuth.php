<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class UserAuth
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
        if($request->path()=="login" && $request->session()->has('user')){
            return redirect('/');
            // return redirect('/login')->with('error');
            
        }


        return $next($request);

        // if(!Auth::check()){
        //     return redirect('/login');
        // }

        // $user = Auth::user();
        // if($user->level == $role){
        //     return $next($request);
        // }

        // return redirect('/login')->with('error, "You dont have any access');
    }
}
