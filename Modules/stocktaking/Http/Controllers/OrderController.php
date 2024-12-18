<?php

namespace Modules\stocktaking\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class OrderController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\stocktaking\\Http\\Requests\\OrderRequest";

    /**
     *  OrderController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\stocktaking\Models\Order';
        $classnamespaceservice= 'Modules\stocktaking\Services\OrderService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

