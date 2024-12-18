<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;

class CheckAccess
{
    /**
     * Maneja la solicitud entrante.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, \Closure $next)
    {
        $module = $request->segment(2);

        if (!$this->hasAccess($module)) {
            abort(404, 'Not found');
        }

        return $next($request);
    }


    /**
     * Verifica si el usuario actual tiene acceso al evento realizado
     *
     * @param string $module
     * @return bool
     */
    public function hasAccess(string $module): bool
    {
        $user = Auth::user();

        if (!$user) {
            return false;
        }

        foreach ($user->array_role as $role) {
            if ($role->array_permissions->some(function ($permission) use ($module) {
                return $permission->event === 'all' && $permission->module === $module;
            })) {
                return true;
            }
        }
        return false;
    }
}