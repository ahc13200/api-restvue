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
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS nomenclature');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('nomenclature.deliveries');
        if (!$exist_table)

          Schema::create('nomenclature.deliveries', function (Blueprint $table) {
                $table->increments('id');
                $table->string('city',255)->nullable();
                $table->integer('amount')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('nomenclature.deliveries');


        return false;
    }
};
