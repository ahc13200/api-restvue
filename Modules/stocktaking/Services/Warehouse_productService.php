<?php


namespace Modules\stocktaking\Services;


use App\Services\BaseService;

class Warehouse_productService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\stocktaking\Models\Warehouse_product');
   }

}

