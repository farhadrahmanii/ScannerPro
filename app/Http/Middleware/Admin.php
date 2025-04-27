<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

class Admin
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
        $roleExists = DB::table('roles')->where('name', $role)->exists();

        if ($roleExists && Auth::user()->status == '1') {
            return $next($request);
        } else {
            flash()->error('You are not authorized to access this page, You may Check your account is active or not?');
            Auth::logout();
            return redirect()->route('login');
        }
    }
}
