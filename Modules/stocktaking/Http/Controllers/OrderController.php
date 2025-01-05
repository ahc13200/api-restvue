<?php

namespace Modules\stocktaking\Http\Controllers;

use App\Http\Controllers\BaseRestController;
use Illuminate\Support\Facades\DB;
use Modules\stocktaking\Http\Requests\OrderRequest;

class OrderController extends BaseRestController
{
    const FORM_REQUEST = "Modules\\stocktaking\\Http\\Requests\\OrderRequest";

    /**
     *  OrderController constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\stocktaking\Models\Order';
        $classnamespaceservice = 'Modules\stocktaking\Services\OrderService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
        $this->middleware('data.transform:' . self::FORM_REQUEST . ',' . $classnamespace);
    }

    public function order_shopping(OrderRequest $request)
    {
        DB::beginTransaction();
        try {
            $data = $request->all();
            $result = $this->service->sendToWhatsapp($data);
            if ($result['success'])
                DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
        return $result;
    }


}

