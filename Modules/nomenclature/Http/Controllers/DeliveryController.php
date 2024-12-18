<?php

namespace Modules\nomenclature\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class DeliveryController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\nomenclature\\Http\\Requests\\DeliveryRequest";

    /**
     *  DeliveryController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\nomenclature\Models\Delivery';
        $classnamespaceservice = 'Modules\nomenclature\Services\DeliveryService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }
}

