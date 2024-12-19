<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Orders table */
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
        $exist_table = $connection->hasTable('stocktaking.orders');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('stocktaking.orders');
            $find=array_search('stocktaking_orders_client_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.orders', 'stocktaking_orders_client_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.orders', function (Blueprint $table) {
                    $table->foreign('client_id')->references('id')->on('admin.clients')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.orders');


        return false;
    }
};
