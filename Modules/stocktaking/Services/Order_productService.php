<?php


namespace Modules\stocktaking\Services;


use App\Services\BaseService;

class Order_productService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\stocktaking\Models\Order_product');
   }

}

