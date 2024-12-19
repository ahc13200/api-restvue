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
        $exist_table = $connection->hasTable('admin.providers');
        if (!$exist_table)

          Schema::create('admin.providers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',300);
                $table->string('identification',300)->nullable();
                $table->string('phone',20)->nullable();
                $table->string('email',200);
                $table->string('country',255)->nullable();
                $table->string('city',255)->nullable();
                $table->string('classification',255)->nullable();
                $table->string('fax',255)->nullable();
                $table->text('observations')->nullable();
                $table->string('address',255)->nullable();
                $table->string('postal_code',8)->nullable();
                $table->date('updated_at')->nullable();
                $table->date('created_at')->nullable();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.providers');


        return false;
    }
};
