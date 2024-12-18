<?php

namespace Modules\stocktaking\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Warehouse_productController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\stocktaking\\Http\\Requests\\Warehouse_productRequest";

    /**
     *  Warehouse_productController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\stocktaking\Models\Warehouse_product';
        $classnamespaceservice= 'Modules\stocktaking\Services\Warehouse_productService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

