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
        $exist_table = $connection->hasTable('admin.workers');
        if (!$exist_table)

          Schema::create('admin.workers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',300);
                $table->string('image',500)->nullable();
                $table->string('phone',255)->nullable();
                $table->string('lastname',255)->nullable();
                $table->unsignedInteger( 'user_id')->nullable();
                $table->date('created_at')->nullable();
                $table->date('updated_at')->nullable();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.workers');


        return false;
    }
};
