<?php

namespace Modules\security\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class PermissionController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\security\\Http\\Requests\\PermissionRequest";

    /**
     *  PermissionController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\security\Models\Permission';
        $classnamespaceservice = 'Modules\security\Services\PermissionService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }


    public function getPermissionAuthUser()
    {
        $result = $this->service->getPermissions();
        return response()->json($result, 200);
    }


}

