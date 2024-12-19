<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Menu_offers table */
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
        $exist_table = $connection->hasTable('restaurant.menu_offers');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('restaurant.menu_offers');
            $find=array_search('restaurant_menu_offers_menu_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('restaurant.menu_offers', 'restaurant_menu_offers_menu_id_foreign') && !is_numeric($find))
                Schema::table('restaurant.menu_offers', function (Blueprint $table) {
                    $table->foreign('menu_id')->references('id')->on('restaurant.menu')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('restaurant.menu_offers');
            $find=array_search('restaurant_menu_offers_offer_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('restaurant.menu_offers', 'restaurant_menu_offers_offer_id_foreign') && !is_numeric($find))
                Schema::table('restaurant.menu_offers', function (Blueprint $table) {
                    $table->foreign('offer_id')->references('id')->on('restaurant.offers')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('restaurant.menu_offers');


        return false;
    }
};
