<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class TurnController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\TurnRequest";

    /**
     *  TurnController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\admin\Models\Turn';
        $classnamespaceservice='Modules\admin\Services\TurnService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

