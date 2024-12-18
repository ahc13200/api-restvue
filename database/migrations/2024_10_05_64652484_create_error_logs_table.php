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
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('error_logs');
        if (!$exist_table)

          Schema::create('error_logs', function (Blueprint $table) {
                $table->increments('id');
                $table->text('description');
                $table->string('ip',255)->nullable();
                $table->text('error')->nullable();
                $table->text('parameters');
                $table->text('request');
                $table->string('user_id',255)->nullable();
                $table->timestamp('created_at')->nullable();
                $table->timestamp('updated_at')->nullable();
                $table->text('headers')->nullable();
                $table->string('username',255)->nullable();
                $table->string('path',255)->nullable();
                $table->integer('status_code')->nullable();


        });

    }

   public function down()
    {
        Schema::dropIfExists('error_logs');


        return false;
    }
};
