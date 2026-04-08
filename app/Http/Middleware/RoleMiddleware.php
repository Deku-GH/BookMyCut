<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Role;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();
        $role = Role::find($user->role_id);

        if (!$role || !in_array($role->name, $roles)) {
            abort(403, 'Unauthorized access');
        }

        return $next($request);
    }
}