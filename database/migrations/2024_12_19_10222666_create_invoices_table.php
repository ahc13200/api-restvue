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
        $exist_table = $connection->hasTable('stocktaking.invoices');
        if (!$exist_table)

          Schema::create('stocktaking.invoices', function (Blueprint $table) {
                $table->increments('id');
                $table->unsignedInteger( 'provider_id')->nullable();
                $table->integer('amount')->nullable();
                $table->string('code',10);
                $table->date('date');
                $table->string('status',255)->nullable();
                $table->unsignedInteger( 'worker_id')->nullable();
                $table->date('created_at')->nullable();
                $table->date('updated_at')->nullable();
                $table->unsignedInteger( 'cancelled_by')->nullable();


        });

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.invoices');


        return false;
    }
};
