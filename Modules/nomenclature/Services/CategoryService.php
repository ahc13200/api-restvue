<?php


namespace Modules\nomenclature\Services;


use App\Services\BaseService;

class CategoryService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\nomenclature\Models\Category');
   }

}

