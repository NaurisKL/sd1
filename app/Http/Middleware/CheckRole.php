<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string $role): Response
    {
        if (!$request->user()) {
            abort(403, 'Unauthorized action.');
        }

        // Allow admin to access everything
        if ($request->user()->role === 'admin') {
            return $next($request);
        }

        // Check specific role for non-admin users
        if ($request->user()->role !== $role) {
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
} 