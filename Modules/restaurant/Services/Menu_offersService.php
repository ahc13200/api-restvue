<?php


namespace Modules\restaurant\Services;


use App\Services\BaseService;

class Menu_offersService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\restaurant\Models\Menu_offers');
   }

}

