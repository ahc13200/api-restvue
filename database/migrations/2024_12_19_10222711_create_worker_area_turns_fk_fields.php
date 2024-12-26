<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Foreign Keys Worker_area_turns table */
return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS admin');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('admin.worker_area_turns');
        if ($exist_table) {
            $foreignkey_list = Schema::getForeignKeys('admin.worker_area_turns');
            $find = array_search('admin_worker_area_turns_area_id_foreign', array_column(json_decode(json_encode($foreignkey_list), TRUE), 'name'));
            if (!Schema::hasIndex('admin.worker_area_turns', 'admin_worker_area_turns_area_id_foreign') && !is_numeric($find))
                Schema::table('admin.worker_area_turns', function (Blueprint $table) {
                    $table->foreign('area_id')->references('id')->on('admin.areas')->onDelete('restrict');
                });
            $foreignkey_list = Schema::getForeignKeys('admin.worker_area_turns');
            $find = array_search('admin_worker_area_turns_turn_id_foreign', array_column(json_decode(json_encode($foreignkey_list), TRUE), 'name'));
            if (!Schema::hasIndex('admin.worker_area_turns', 'admin_worker_area_turns_turn_id_foreign') && !is_numeric($find))
                Schema::table('admin.worker_area_turns', function (Blueprint $table) {
                    $table->foreign('turn_id')->references('id')->on('admin.turns')->onDelete('restrict');
                });
            $foreignkey_list = Schema::getForeignKeys('admin.worker_area_turns');
            $find = array_search('admin_worker_area_turns_worker_id_foreign', array_column(json_decode(json_encode($foreignkey_list), TRUE), 'name'));
            if (!Schema::hasIndex('admin.worker_area_turns', 'admin_worker_area_turns_worker_id_foreign') && !is_numeric($find))
                Schema::table('admin.worker_area_turns', function (Blueprint $table) {
                    $table->foreign('worker_id')->references('id')->on('admin.workers')->onDelete('cascade');
                });
        };

    }

    public function down()
    {
        Schema::dropIfExists('admin.worker_area_turns');


        return false;
    }
};
