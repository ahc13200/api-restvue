<?php

namespace Modules\restaurant\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class OfferController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\restaurant\\Http\\Requests\\OfferRequest";

    /**
     *  OfferController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\restaurant\Models\Offer';
        $classnamespaceservice = 'Modules\restaurant\Services\OffersService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }

    public function popular_dishes()
    {
        $offers = $this->service->popular_offers();
        return response()->json($offers, 200);
    }

}

