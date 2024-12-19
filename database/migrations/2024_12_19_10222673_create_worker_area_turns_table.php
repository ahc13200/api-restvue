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
        $exist_table = $connection->hasTable('admin.worker_area_turns');
        if (!$exist_table)

          Schema::create('admin.worker_area_turns', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger( 'worker_id');
                $table->unsignedInteger( 'area_id');
                $table->unsignedInteger( 'turn_id')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.worker_area_turns');


        return false;
    }
};
