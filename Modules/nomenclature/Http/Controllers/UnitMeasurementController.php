<?php

namespace Modules\nomenclature\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class UnitMeasurementController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\nomenclature\\Http\\Requests\\UnitMeasurementRequest";

    /**
     *  CategoryController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\nomenclature\Models\UnitMeasurement';
        $classnamespaceservice = 'Modules\nomenclature\Services\UnitMeasurementService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }


}

