<?php


namespace Modules\admin\Services;


use App\Services\BaseService;
use Modules\admin\Models\Worker;
use Modules\admin\Models\Worker_user_view;

class WorkerService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\admin\Models\Worker');
    }

    public function getWorkers()
    {
        return Worker_user_view::query()->with([
            'array_role.role:id,name',
            'array_area_turn.area:id,name',
            'array_area_turn.turn:id,working_day'
        ])->get();
    }

}

