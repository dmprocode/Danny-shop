<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must be logged in to access this page.');
        }

        // Check if the user role matches
        if (Auth::user()->userRole !== $role) {
            return redirect()->route('unathorized')->with('error', 'Access Denied. You do not have permission.');
        }

        return $next($request);
    }
}
