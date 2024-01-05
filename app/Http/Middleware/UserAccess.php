<?php

namespace App\Http\Middleware;

use App\Http\Middleware\Controller;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if(auth()->user()->type == $userType){
            return $next($request);
        }
          
        Auth::logout();
        return redirect('/')->with('message', json_encode(['failed'=>'You do not have permission to access for this page.']));
    }
}
