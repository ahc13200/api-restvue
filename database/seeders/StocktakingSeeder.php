<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StocktakingSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::beginTransaction();
        try {

            \Modules\nomenclature\Models\Category::factory(10)->create();
            \Modules\admin\Models\Area::factory(10)->create();
            \Modules\security\Models\Role::factory(10)->create();
            \Modules\security\Models\User::factory(10)->create();
            \Modules\admin\Models\Turn::factory(10)->create();
            \Modules\admin\Models\Provider::factory(10)->create();
            \Modules\security\Models\Role_user::factory(10)->create();
            \Modules\admin\Models\Product::factory(10)->create();
            \Modules\admin\Models\Provider_product::factory(10)->create();
            \Modules\admin\Models\Worker_areaTurn::factory(10)->create();
            \Modules\admin\Models\Worker_turn::factory(10)->create();
            \Modules\stocktaking\Models\Ipb::factory(10)->create();
            \Modules\stocktaking\Models\Low_reason::factory(10)->create();

            DB::commit();
        } catch (\Throwable $e) {
            DB::rollBack();
            throw $e;
        }
    }
}

