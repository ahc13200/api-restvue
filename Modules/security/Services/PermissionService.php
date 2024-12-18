<?php


namespace Modules\security\Services;


use App\Services\BaseService;
use Illuminate\Support\Facades\Auth;

class PermissionService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\security\Models\Permission');
    }

    public function getPermissions()
    {
        $user = Auth::user();
        $permissions = collect($user->array_role)
            ->flatMap(fn($role) => $role->array_permissions)
            ->map(fn($i)=>$i->module.".".$i->event)
            ->unique()
            ->values();

        return $permissions->all();
    }

}

