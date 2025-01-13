<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIPAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $allowedIp = env('IP_VPS');

        if ($request->ip() !== $allowedIp) {
            return $request->ip();
//            abort(404, 'Not found');
        }

        return $next($request);
    }
}