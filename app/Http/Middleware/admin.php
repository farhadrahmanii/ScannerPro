<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $role = Auth::user()->role;

        if ($role == 'admin' && Auth::user()->status == '1') { // Correct comparison operator
            return $next($request);
        } else {
            flash()->error('You are not authorized to access this page, You may Check your account is active or not?');
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
