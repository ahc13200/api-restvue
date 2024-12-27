<?php

namespace Modules\dashboard\Http\Controllers;

use App\Http\Controllers\BaseRestController;

class DashboardController extends BaseRestController
{
    /**
     *  Dashboard_Controller constructor.
     */
    public function __construct()
    {
        $classnamespace = 'Modules\dashboard\Models\MonthlyOrderComparison';
        $classnamespaceservice = 'Modules\dashboard\Services\DashboardService';
        $this->modelClass = new $classnamespace;
        $this->service = new $classnamespaceservice(new $classnamespace);
    }

    public function dataDashboard()
    {
        $result = $this->service->get_data_dashboard();
        return response()->json($result, 200);
    }

}

