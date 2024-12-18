<?php

namespace Modules\restaurant\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class MenuController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\restaurant\\Http\\Requests\\MenuRequest";

    /**
     *  MenuController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\restaurant\Models\Menu';
        $classnamespaceservice='Modules\restaurant\Services\MenuService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

