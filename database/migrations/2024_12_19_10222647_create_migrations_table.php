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
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS public');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('public.migrations');
        if (!$exist_table)

          Schema::create('public.migrations', function (Blueprint $table) {
                $table->increments('id');
                $table->string('migration',255);
                $table->integer('batch');
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('public.migrations');


        return false;
    }
};
