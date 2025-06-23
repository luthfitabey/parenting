<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        // Check if user is authenticated
        if (!Auth::check()) {
            return redirect('/login')->with('error', 'You must be logged in.');
        }

        // Ensure 'type' is compared as a string
        $userRole = (string) Auth::user()->type;

        if ($userRole === $userType) {
            return $next($request);
        }

        // Logout unauthorized users and redirect
        Auth::logout();
        return redirect('/')
            ->with('message', 'You do not have permission to access this page.');
    }
}
