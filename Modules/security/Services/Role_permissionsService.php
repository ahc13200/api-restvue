<?php


namespace Modules\security\Services;


use App\Services\BaseService;

class Role_permissionsService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\security\Models\Role_permissions');
   }

}

