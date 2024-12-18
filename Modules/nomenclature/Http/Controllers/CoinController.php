<?php

namespace Modules\nomenclature\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class CoinController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\nomenclature\\Http\\Requests\\CoinRequest";

    /**
     *  CategoryController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\nomenclature\Models\Coin';
        $classnamespaceservice='Modules\nomenclature\Services\CoinService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

