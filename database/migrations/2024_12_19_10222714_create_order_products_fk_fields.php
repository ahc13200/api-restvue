<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Order_products table */
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
        $exist_table = $connection->hasTable('stocktaking.order_products');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('stocktaking.order_products');
            $find=array_search('stocktaking_order_products_offer_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.order_products', 'stocktaking_order_products_offer_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.order_products', function (Blueprint $table) {
                    $table->foreign('offer_id')->references('id')->on('restaurant.offers')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('stocktaking.order_products');
            $find=array_search('stocktaking_order_products_order_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.order_products', 'stocktaking_order_products_order_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.order_products', function (Blueprint $table) {
                    $table->foreign('order_id')->references('id')->on('stocktaking.orders')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.order_products');


        return false;
    }
};
