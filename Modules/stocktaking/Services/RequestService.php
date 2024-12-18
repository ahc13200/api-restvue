<?php


namespace Modules\stocktaking\Services;


use App\Services\BaseService;

class RequestService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\stocktaking\Models\Request');
   }

}

