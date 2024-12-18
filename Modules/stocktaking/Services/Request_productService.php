<?php


namespace Modules\stocktaking\Services;


use App\Services\BaseService;

class Request_productService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\stocktaking\Models\Request_product');
   }

}

