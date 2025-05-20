<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Unauthorized');
        }

        // Gunakan is_admin untuk cek role
        if ($role === 'admin' && !$user->is_admin) {
            abort(403, 'Unauthorized');
        }

        if ($role === 'user' && $user->is_admin) {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}
