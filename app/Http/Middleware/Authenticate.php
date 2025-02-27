<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Closure;  // ✅ Use PHP's built-in Closure
use Illuminate\Support\Facades\Auth;  // ✅ Import Auth facade

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }

    public function handle($request, Closure $next, ...$guards)
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'You must log in first.');
        }

        return $next($request);
    }
}
