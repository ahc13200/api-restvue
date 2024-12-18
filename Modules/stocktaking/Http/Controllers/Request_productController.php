<?php

namespace Modules\stocktaking\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Request_productController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\stocktaking\\Http\\Requests\\Request_productRequest";

    /**
     *  Request_productController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\stocktaking\Models\Request_product';
        $classnamespaceservice= 'Modules\stocktaking\Services\Request_productService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

