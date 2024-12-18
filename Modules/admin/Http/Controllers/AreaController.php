<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class AreaController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\AreaRequest";

    /**
     *  AreaController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\admin\Models\Area';
        $classnamespaceservice='Modules\admin\Services\AreaService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

