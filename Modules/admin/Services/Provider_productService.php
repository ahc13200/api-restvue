<?php


namespace Modules\admin\Services;


use App\Services\BaseService;

class Provider_productService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\admin\Models\Provider_product');
   }

}

