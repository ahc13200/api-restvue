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
        $exist_table = $connection->hasTable('stocktaking.orders');
        if (!$exist_table)

          Schema::create('stocktaking.orders', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('total_amount')->nullable();
                $table->date('date')->nullable();
                $table->string('type_payment',255)->nullable();
                $table->boolean('is_delivery')->nullable();
                $table->integer('delivery_amount')->nullable();
                $table->unsignedInteger( 'client_id')->nullable();
                $table->string('status',255)->nullable();
                $table->string('created_in',255)->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.orders');


        return false;
    }
};
