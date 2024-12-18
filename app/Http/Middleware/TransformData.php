<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TransformData
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @return Response
     */
    public function handle(Request $request, Closure $next): Response
    {
        $checking = str_ends_with($request->getPathInfo(), '/validate') || ($request->method() == 'POST' && substr_count($request->getPathInfo(), '/') == 3) || (($request->method() == 'PUT' || $request->method() == 'PATCH') && substr_count($request->getPathInfo(), '/') == 4);
        if ($checking) {
            $class = array_slice(func_get_args(), 2)[0];
            $modelClass = array_slice(func_get_args(), 2)[1];
            if ($request->method() == 'PUT' || $request->method() == 'PATCH') {
                $model = new $modelClass();
                $id = $model->getKeyName();
                $path_array = explode("/", $request->getPathInfo());
                $valueID = array_pop($path_array);
                $request->request->add([$id => $valueID]);
            }
            $class::createFrom($request)->validate_request();
        }
        return $next($request);
    }
}


