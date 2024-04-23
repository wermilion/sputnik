<?php

namespace App\Http\Middleware;

use Closure;

readonly class IsAdmin
{
    public function handle($request, Closure $next): mixed
    {
        if (auth()->guard('api')->user()->is_admin) {
            return $next($request);
        }

        return response()->json(['message' => 'Access denied'], 403);
    }
}
