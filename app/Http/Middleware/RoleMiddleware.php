<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        if (!Auth::check()) {
            abort(403, 'Unauthorized');
        }

        $user = Auth::user();

        // Jika role admin, hanya boleh user dengan is_admin = true
        if ($role === 'admin' && !$user->is_admin) {
            abort(403, 'Unauthorized');
        }
        // Jika role user, hanya boleh user dengan is_admin = false
        if ($role === 'user' && $user->is_admin) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}