<?php


namespace Modules\restaurant\Services;


use App\Services\BaseService;

class MenuService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\restaurant\Models\Menu');
   }

}

