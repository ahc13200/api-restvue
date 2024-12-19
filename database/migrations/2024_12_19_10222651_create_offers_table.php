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
        $exist_table = $connection->hasTable('restaurant.offers');
        if (!$exist_table)

          Schema::create('restaurant.offers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',255)->nullable();
                $table->integer('price')->nullable();
                $table->string('image',255)->nullable();
                $table->string('description',255)->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('restaurant.offers');


        return false;
    }
};
