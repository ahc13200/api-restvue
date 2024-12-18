<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Provider_productController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\Provider_productRequest";

    /**
     *  Provider_productController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\admin\Models\Provider_product';
        $classnamespaceservice='Modules\admin\Services\Provider_productService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

