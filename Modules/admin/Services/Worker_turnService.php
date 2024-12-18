<?php


namespace Modules\admin\Services;


use App\Services\BaseService;

class Worker_turnService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\admin\Models\Worker_turn');
   }

}

