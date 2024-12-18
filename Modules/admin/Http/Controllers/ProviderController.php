<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class ProviderController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\ProviderRequest";

    /**
     *  ProviderController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\admin\Models\Provider';
        $classnamespaceservice='Modules\admin\Services\ProviderService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

