<?php

namespace Modules\security\Http\Controllers;

use App\Http\Controllers\RestController;

class Role_permissionsController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\security\\Http\\Requests\\Role_permissionsRequest";

    /**
     *  Role_permissionsController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\security\Models\Role_permissions';
        $classnamespaceservice='Modules\security\Services\Role_permissionsService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

