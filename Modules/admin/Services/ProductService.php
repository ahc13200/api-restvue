<?php


namespace Modules\admin\Services;


use App\Services\BaseService;
use Modules\admin\Models\Product_view;

class ProductService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\admin\Models\Product');
    }

    public function products_list()
    {
        return Product_view::query()->where('quantity', '>', 0)->get();
    }

}

