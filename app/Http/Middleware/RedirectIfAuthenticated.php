<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RedirectIfAuthenticated
{
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if (Auth::check()) {
            $user = Auth::user();
            // Jika is_admin true, redirect ke admin.dashboard
            if ($user->is_admin) {
                return redirect()->route('admin.dashboard');
            }
            // Jika is_admin false, redirect ke user.dashboard
            return redirect()->route('user.dashboard');
        }

        return $next($request);
    }
}