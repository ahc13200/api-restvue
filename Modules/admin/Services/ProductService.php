<?php


namespace Modules\admin\Services;


use App\Services\BaseService;
use Modules\admin\Models\ProviderProductCategory;

class ProductService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\admin\Models\Product');
    }

}

