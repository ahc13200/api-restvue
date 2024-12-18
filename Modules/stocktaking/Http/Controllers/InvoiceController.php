<?php

namespace Modules\stocktaking\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class InvoiceController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\stocktaking\\Http\\Requests\\InvoiceRequest";

    /**
     *  InvoiceController constructor.
     */
    public function __construct()
    {
        $classnamespace= 'Modules\stocktaking\Models\Invoice';
        $classnamespaceservice= 'Modules\stocktaking\Services\InvoiceService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

