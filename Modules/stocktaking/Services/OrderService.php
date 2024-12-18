<?php


namespace Modules\stocktaking\Services;


use App\Services\BaseService;

class OrderService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\stocktaking\Models\Order');
   }

}

