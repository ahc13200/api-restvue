<?php

namespace Modules\admin\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class WorkerController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\admin\\Http\\Requests\\WorkerRequest";

    /**
     *  UserController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\admin\Models\Worker';
        $classnamespaceservice = 'Modules\admin\Services\WorkerService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }

    public function list()
    {
        $workers = $this->service->getWorkers();
        $result = ['data' => $workers];
        return response()->json($result, 200);
    }

}

