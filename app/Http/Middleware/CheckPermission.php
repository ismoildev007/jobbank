<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next): Response
    {
        if (auth()->check() && auth()->user()->role === User::ROLE_ADMIN) {
            return $next($request);
        }
        abort(403, 'Sizda bu sahifaga kirish uchun ruxsat yo‘q.');
    }
}
