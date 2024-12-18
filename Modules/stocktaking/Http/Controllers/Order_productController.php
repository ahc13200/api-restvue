<?php

namespace Modules\stocktaking\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Order_productController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\stocktaking\\Http\\Requests\\Order_productRequest";

    /**
     *  Order_productController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\stocktaking\Models\Order_product';
        $classnamespaceservice= 'Modules\stocktaking\Services\Order_productService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

