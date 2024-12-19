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
        $exist_table = $connection->hasTable('nomenclature.unit_measurement');
        if (!$exist_table)

          Schema::create('nomenclature.unit_measurement', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',300);
                $table->string('acronym',20);
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('nomenclature.unit_measurement');


        return false;
    }
};
