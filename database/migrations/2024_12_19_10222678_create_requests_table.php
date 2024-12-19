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
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS stocktaking');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('stocktaking.requests');
        if (!$exist_table)

          Schema::create('stocktaking.requests', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger( 'worker_id')->nullable();
                $table->text('description')->nullable();
                $table->string('status',255)->nullable();
                $table->date('date')->nullable();
                $table->unsignedInteger( 'cancelled_by')->nullable();
                $table->timestamps();


        });

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.requests');


        return false;
    }
};
