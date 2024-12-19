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
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS security');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('security.permissions');
        if (!$exist_table)

          Schema::create('security.permissions', function (Blueprint $table) {
                $table->increments('id');
                $table->string('permission',255)->nullable();
                $table->string('description',255)->nullable();
                $table->string('module',255)->nullable();
                $table->string('event',255)->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('security.permissions');


        return false;
    }
};
