<?php


namespace Modules\admin\Services;


use App\Services\BaseService;

class ClientService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\admin\Models\Client');
   }

}

