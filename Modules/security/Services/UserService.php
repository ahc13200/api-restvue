<?php


namespace Modules\security\Services;


use App\Services\BaseService;
use Modules\security\Models\User;

class UserService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\security\Models\User');
    }

    public function getWorkers()
    {
        return User::query()->with([
            'array_role',
            'array_area_turn.area:id,name',
            'array_area_turn.turn:id,working_day'
        ])->get();
    }

}

