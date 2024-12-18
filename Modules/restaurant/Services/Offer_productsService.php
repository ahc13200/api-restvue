<?php


namespace Modules\restaurant\Services;


use App\Services\BaseService;

class Offer_productsService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\restaurant\Models\Offer_products');
   }

}

