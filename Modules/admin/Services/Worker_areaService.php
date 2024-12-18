<?php


namespace Modules\admin\Services;


use App\Services\BaseService;

class Worker_areaService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\admin\Models\Worker_areaTurn');
   }

}

