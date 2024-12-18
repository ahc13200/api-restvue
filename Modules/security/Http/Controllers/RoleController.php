<?php

namespace Modules\security\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class RoleController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\security\\Http\\Requests\\RoleRequest";

    /**
     *  RoleController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\security\Models\Role';
        $classnamespaceservice='Modules\security\Services\RoleService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

