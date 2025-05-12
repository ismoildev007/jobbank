<?php

namespace App\Http\Middleware;

use App\Models\User;
use App\Models\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\RolePermission;

class CheckPermission
{
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();

        if (!$user) {
            abort(403, 'Siz tizimga kirmagansiz!');
        }

        $routeName = $request->route()->getName();

        $user_roles = UserRole::where('user_id', $user->id)->get()->toArray();

        $roleIds = array_column($user_roles, 'role_id');

        $check = RolePermission::whereIn('role_id', $roleIds)->where('route_name', $routeName)->where('status', 1)->get()->toArray();

        if (empty($check)) {
            abort(403, 'Sizga mumkin emas!');
        }

        return $next($request);
    }
}
