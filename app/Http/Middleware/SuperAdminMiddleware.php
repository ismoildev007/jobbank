<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->user() || !auth()->user()->hasRole('superAdmin')) {
            abort(403, 'Sizda ruxsat yo‘q.');
        }
        return $next($request);
    }
}
