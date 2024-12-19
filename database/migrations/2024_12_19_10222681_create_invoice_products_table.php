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
        $exist_table = $connection->hasTable('stocktaking.invoice_products');
        if (!$exist_table)

          Schema::create('stocktaking.invoice_products', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger( 'invoice_id')->nullable();
                $table->unsignedInteger( 'product_id')->nullable();
                $table->integer('quantity')->nullable();
                $table->integer('price')->nullable();
                $table->unsignedInteger( 'coin_id')->nullable();
                $table->unsignedInteger( 'unit_id')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.invoice_products');


        return false;
    }
};
