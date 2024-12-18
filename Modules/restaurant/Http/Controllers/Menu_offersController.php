<?php

namespace Modules\restaurant\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Menu_offersController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\restaurant\\Http\\Requests\\Menu_offersRequest";

    /**
     *  Menu_offersController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\restaurant\Models\Menu_offers';
        $classnamespaceservice='Modules\restaurant\Services\Menu_offersService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

