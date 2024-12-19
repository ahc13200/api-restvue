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
        $exist_table = $connection->hasTable('admin.provider_contacts');
        if (!$exist_table)

          Schema::create('admin.provider_contacts', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',255)->nullable();
                $table->string('lastname',255)->nullable();
                $table->string('email',255)->nullable();
                $table->string('phone',255)->nullable();
                $table->unsignedInteger( 'provider_id')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.provider_contacts');


        return false;
    }
};
