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
        $exist_table = $connection->hasTable('security.users');
        if (!$exist_table)

          Schema::create('security.users', function (Blueprint $table) {
                $table->increments('id');
                $table->string('username',255)->nullable();
                $table->string('email',255)->nullable();
                $table->string('password',255)->nullable();
                $table->date('created_at')->nullable();
                $table->date('updated_at')->nullable();


        });

    }

   public function down()
    {
        Schema::dropIfExists('security.users');


        return false;
    }
};
