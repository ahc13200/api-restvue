<?php

namespace Modules\nomenclature\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class CategoryController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\nomenclature\\Http\\Requests\\CategoryRequest";

    /**
     *  CategoryController constructor.
     */
    public function __construct()
    {
        $classnamespace='Modules\nomenclature\Models\Category';
        $classnamespaceservice='Modules\nomenclature\Services\CategoryService';
        $this->modelClass=new $classnamespace ;
        $this->service= new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:'.self::FORM_REQUEST.','.$classnamespace);
    }


}

