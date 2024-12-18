<?php


namespace Modules\stocktaking\Services;


use App\Services\BaseService;

class InvoiceService extends BaseService
{

 public function __construct()
  {
      parent::__construct('Modules\stocktaking\Models\Invoice');
   }

}

