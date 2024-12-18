<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Worker_areaController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\Worker_areaRequest";

    /**
     *  Worker_areaController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\admin\Models\Worker_areaTurn';
        $classnamespaceservice='Modules\admin\Services\Worker_areaService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

