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
        $exist_table = $connection->hasTable('admin.clients');
        if (!$exist_table)

          Schema::create('admin.clients', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',255)->nullable();
                $table->string('phone',255)->nullable();
                $table->string('address',255)->nullable();
                $table->string('province',255)->nullable();
                $table->string('city',255)->nullable();
                $table->string('registered_in',255)->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.clients');


        return false;
    }
};
