<?php

namespace Modules\restaurant\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class Offer_productsController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\restaurant\\Http\\Requests\\Offer_productsRequest";

    /**
     *  Offer_productsController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\restaurant\Models\Offer_products';
        $classnamespaceservice='Modules\restaurant\Services\Offer_productsService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

