<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class LockScreenMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && session('lock_screen') === true) {
            return redirect()->route('lock_screen');
        }
        return $next($request);
    }
}