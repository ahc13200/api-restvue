<?php

namespace Modules\stocktaking\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class RequestController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\stocktaking\\Http\\Requests\\RequestRequest";

    /**
     *  RequestController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\stocktaking\Models\Request';
        $classnamespaceservice= 'Modules\stocktaking\Services\RequestService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

