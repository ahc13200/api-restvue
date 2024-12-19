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
        $exist_table = $connection->hasTable('restaurant.menu');
        if (!$exist_table)

          Schema::create('restaurant.menu', function (Blueprint $table) {
                $table->increments('id');
                $table->date('date')->nullable();
                $table->string('meal_type',255)->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('restaurant.menu');


        return false;
    }
};
