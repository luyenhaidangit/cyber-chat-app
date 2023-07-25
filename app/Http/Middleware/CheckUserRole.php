<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (Auth::check()) {
            $userRoles = Auth::user()->roles()->pluck('name')->toArray();
            foreach ($roles as $role) {
                if (in_array($role, $userRoles)) {
                    return $next($request);
                }
            }
        }

        abort(403, 'Unauthorized.');
    }
}