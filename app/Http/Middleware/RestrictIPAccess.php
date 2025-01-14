<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RestrictIPAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $allowedIp = env('IP_VPS');

        if ($request->server('SERVER_ADDR') !== $allowedIp) {
            abort(404, 'Not Found'.$request->server('SERVER_ADDR'));
        }

        return $next($request);
    }
}