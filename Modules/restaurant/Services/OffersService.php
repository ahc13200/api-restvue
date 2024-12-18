<?php


namespace Modules\restaurant\Services;


use App\Services\BaseService;
use Modules\restaurant\Models\Offer;
use Modules\restaurant\Models\Popular_offers_view;

class OffersService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\restaurant\Models\Offer');
    }

    public function popular_offers()
    {
        return Popular_offers_view::all();
    }

}

