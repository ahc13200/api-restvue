<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;
use Illuminate\Support\Facades\DB;

class ProductController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\ProductRequest";

    /**
     *  ProductController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\admin\Models\Product';
        $classnamespaceservice = 'Modules\admin\Services\ProductService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }

    public function list()
    {
        $products = $this->service->products_list();
        $result = ['data' => $products];
        return response()->json($result, 200);
    }

}

