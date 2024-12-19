<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 */
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
        if (!$exist_table)

          Schema::create('restaurant.menu_offers', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger( 'menu_id')->nullable();
                $table->unsignedInteger( 'offer_id')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('restaurant.menu_offers');


        return false;
    }
};
