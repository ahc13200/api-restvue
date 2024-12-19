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
        $exist_table = $connection->hasTable('security.roles');
        if (!$exist_table)

          Schema::create('security.roles', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',300);
                $table->string('description',300)->nullable();
                $table->date('created_at')->nullable();
                $table->date('updated_at')->nullable();


        });

    }

   public function down()
    {
        Schema::dropIfExists('security.roles');


        return false;
    }
};
