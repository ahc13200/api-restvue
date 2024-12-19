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
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS admin');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('admin.provider_products');
        if (!$exist_table)

          Schema::create('admin.provider_products', function (Blueprint $table) {
                $table->increments('id');
                $table->float('price');
                $table->integer('stock_quantity');
                $table->unsignedInteger( 'product_id');
                $table->unsignedInteger( 'provider_id');
                $table->unsignedInteger( 'coin_id')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.provider_products');


        return false;
    }
};
