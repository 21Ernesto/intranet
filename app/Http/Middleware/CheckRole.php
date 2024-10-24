<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (! auth()->check()) {
            abort(401, 'Unauthorized');
        }

        foreach ($roles as $role) {
            if (auth()->user()->role->key === $role) {
                return $next($request);
            }
        }

        // abort(403, 'Forbidden');
        return response()->view('errors.403', [], 403);

    }
}
