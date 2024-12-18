<?php


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ApiKey
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->header('api-key') == 'user-api-key')
            return $next($request);
        else {
            $data = [
                'status' => 200,
                'message' => 'Project Unauthorized'
            ];
            return response()->json($data);
        }

    }
}
