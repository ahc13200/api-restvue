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
        $exist_table = $connection->hasTable('admin.products');
        if (!$exist_table)

          Schema::create('admin.products', function (Blueprint $table) {
                $table->increments('id');
                $table->string('name',300);
                $table->string('code',10);
                $table->unsignedInteger( 'category_id');
                $table->date('created_at')->nullable();
                $table->date('updated_at')->nullable();
                $table->string('image',255)->nullable();
                $table->unsignedInteger( 'unit_id')->nullable();


        });

    }

   public function down()
    {
        Schema::dropIfExists('admin.products');


        return false;
    }
};
