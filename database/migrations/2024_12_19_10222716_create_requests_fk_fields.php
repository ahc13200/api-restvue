<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Requests table */
return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS stocktaking');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('stocktaking.requests');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('stocktaking.requests');
            $find=array_search('stocktaking_requests_cancelled_by_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.requests', 'stocktaking_requests_cancelled_by_foreign') && !is_numeric($find))
                Schema::table('stocktaking.requests', function (Blueprint $table) {
                    $table->foreign('cancelled_by')->references('id')->on('admin.workers')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('stocktaking.requests');
            $find=array_search('stocktaking_requests_worker_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.requests', 'stocktaking_requests_worker_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.requests', function (Blueprint $table) {
                    $table->foreign('worker_id')->references('id')->on('admin.workers')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.requests');


        return false;
    }
};
