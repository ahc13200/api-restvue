<?php


namespace Modules\admin\Services;


use App\Services\BaseService;

class TurnService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\admin\Models\Turn');
   }

}

