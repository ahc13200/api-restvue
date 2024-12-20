<?php

namespace Database\Seeders;

use App\Helpers\Utils;
use Illuminate\Database\Seeder;
use Modules\admin\Models\Area;
use Modules\admin\Models\Client;
use Modules\admin\Models\Product;
use Modules\admin\Models\Provider;
use Modules\admin\Models\Turn;
use Modules\admin\Models\Worker;
use Modules\nomenclature\Models\Category;
use Modules\nomenclature\Models\Coin;
use Modules\nomenclature\Models\Delivery;
use Modules\nomenclature\Models\UnitMeasurement;
use Modules\security\Models\Permission;
use Modules\security\Models\Role;
use Modules\security\Models\Role_permissions;
use Modules\security\Models\Role_user;
use Modules\security\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //admin
        Utils::loadFromJson(Area::class, __DIR__ . '/admin/areas.json', 'id');
        Utils::loadFromJson(Client::class, __DIR__ . '/admin/clients.json', 'id');
        Utils::loadFromJson(Turn::class, __DIR__ . '/admin/turns.json', 'id');

        //nomenclatures
        Utils::loadFromJson(Category::class, __DIR__ . '/nomenclatures/category.json', 'id');
        Utils::loadFromJson(Coin::class, __DIR__ . '/nomenclatures/coins.json', 'id');
        Utils::loadFromJson(UnitMeasurement::class, __DIR__ . '/nomenclatures/unit_measurement.json', 'id');
        Utils::loadFromJson(Delivery::class, __DIR__ . '/nomenclatures/deliveries.json', 'id');

        //security
        Utils::loadFromJson(User::class, __DIR__ . '/security/users.json', 'id');
        Utils::loadFromJson(Role::class, __DIR__ . '/security/roles.json', 'id');
        Utils::loadFromJson(Permission::class, __DIR__ . '/security/permissions.json', 'id');
        Utils::loadFromJson(Role_user::class, __DIR__ . '/security/role_users.json', 'id');
        Utils::loadFromJson(Role_permissions::class, __DIR__ . '/security/role_permissions.json', 'id');


    }
}

