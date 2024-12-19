<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Offer_products table */
return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS restaurant');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('restaurant.offer_products');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('restaurant.offer_products');
            $find=array_search('restaurant_offer_products_product_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('restaurant.offer_products', 'restaurant_offer_products_product_id_foreign') && !is_numeric($find))
                Schema::table('restaurant.offer_products', function (Blueprint $table) {
                    $table->foreign('product_id')->references('id')->on('admin.products')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('restaurant.offer_products');
            $find=array_search('restaurant_offer_products_unit_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('restaurant.offer_products', 'restaurant_offer_products_unit_id_foreign') && !is_numeric($find))
                Schema::table('restaurant.offer_products', function (Blueprint $table) {
                    $table->foreign('unit_id')->references('id')->on('nomenclature.unit_measurement')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('restaurant.offer_products');
            $find=array_search('restaurant_offer_products_offer_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('restaurant.offer_products', 'restaurant_offer_products_offer_id_foreign') && !is_numeric($find))
                Schema::table('restaurant.offer_products', function (Blueprint $table) {
                    $table->foreign('offer_id')->references('id')->on('restaurant.offers')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('restaurant.offer_products');


        return false;
    }
};
