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
        $exist_table = $connection->hasTable('admin.turns');
        if (!$exist_table)

          Schema::create('admin.turns', function (Blueprint $table) {
                $table->increments('id');
                $table->string('code',10);
                $table->string('working_day',255)->nullable();
                $table->string('entry_time')->nullable();
                $table->string('departure_time')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.turns');


        return false;
    }
};
