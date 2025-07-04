<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureUserHasRole
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Periksa apakah pengguna sudah terautentikasi dan memiliki peran yang sesuai
        if (Auth::check() && Auth::user()->role !== $role) {
            return redirect('/');
        }

        return $next($request);
    }
}
