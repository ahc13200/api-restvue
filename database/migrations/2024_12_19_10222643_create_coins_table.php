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
        $exist_table = $connection->hasTable('nomenclature.coins');
        if (!$exist_table)

          Schema::create('nomenclature.coins', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',300);
                $table->string('acronym',20)->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('nomenclature.coins');


        return false;
    }
};
