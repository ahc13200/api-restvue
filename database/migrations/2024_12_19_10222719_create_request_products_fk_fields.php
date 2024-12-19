<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Request_products table */
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
        $exist_table = $connection->hasTable('stocktaking.request_products');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('stocktaking.request_products');
            $find=array_search('stocktaking_request_products_request_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.request_products', 'stocktaking_request_products_request_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.request_products', function (Blueprint $table) {
                    $table->foreign('request_id')->references('id')->on('stocktaking.requests')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.request_products');


        return false;
    }
};
