<?php


namespace Modules\admin\Services;


use App\Services\BaseService;

class ProviderService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\admin\Models\Provider');
   }

}

