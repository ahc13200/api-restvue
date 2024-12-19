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
        $exist_table = $connection->hasTable('admin.areas');
        if (!$exist_table)

          Schema::create('admin.areas', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',300);
                $table->string('code',10);
                $table->string('description',300)->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.areas');


        return false;
    }
};
