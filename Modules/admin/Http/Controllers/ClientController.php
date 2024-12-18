<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class ClientController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\ClientRequest";

    /**
     *  ClientController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\admin\Models\Client';
        $classnamespaceservice = 'Modules\admin\Services\ClientService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }


}

