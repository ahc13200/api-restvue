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
        $exist_table = $connection->hasTable('security.role_users');
        if (!$exist_table)

          Schema::create('security.role_users', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger( 'user_id');
                $table->unsignedInteger( 'role_id');
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('security.role_users');


        return false;
    }
};
