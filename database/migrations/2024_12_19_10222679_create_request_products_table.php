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
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS stocktaking');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('stocktaking.request_products');
        if (!$exist_table)

          Schema::create('stocktaking.request_products', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger( 'request_id')->nullable();
                $table->integer('product_id')->nullable();
                $table->integer('quantity')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.request_products');


        return false;
    }
};
