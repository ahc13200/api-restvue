<?php


namespace Modules\nomenclature\Services;


use App\Services\BaseService;

class CoinService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\nomenclature\Models\Coin');
    }

}

