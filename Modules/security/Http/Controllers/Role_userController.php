<?php

namespace Modules\security\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Role_userController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\security\\Http\\Requests\\Role_userRequest";

    /**
     *  Role_userController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\security\Models\Role_user';
        $classnamespaceservice= 'Modules\security\Services\Role_userService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

