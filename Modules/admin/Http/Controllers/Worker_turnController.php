<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Worker_turnController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\Worker_turnRequest";

    /**
     *  Worker_turnController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\admin\Models\Worker_turn';
        $classnamespaceservice = 'Modules\admin\Services\Worker_turnService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }


}

