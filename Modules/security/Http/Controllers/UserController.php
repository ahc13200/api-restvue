<?php

namespace Modules\security\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class UserController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\security\\Http\\Requests\\UserRequest";

    /**
     *  UserController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\security\Models\User';
        $classnamespaceservice = 'Modules\security\Services\UserService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }

}

