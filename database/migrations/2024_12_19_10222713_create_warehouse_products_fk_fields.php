<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Warehouse_products table */
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
        $exist_table = $connection->hasTable('stocktaking.warehouse_products');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('stocktaking.warehouse_products');
            $find=array_search('stocktaking_warehouse_products_product_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.warehouse_products', 'stocktaking_warehouse_products_product_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.warehouse_products', function (Blueprint $table) {
                    $table->foreign('product_id')->references('id')->on('admin.products')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.warehouse_products');


        return false;
    }
};
