<?php


namespace Modules\nomenclature\Services;


use App\Services\BaseService;

class UnitMeasurementService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\nomenclature\Models\UnitMeasurement');
    }

}

