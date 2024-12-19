<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Category table */
return new class extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS nomenclature');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('nomenclature.category');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('nomenclature.category');
            $find=array_search('nomenclature_category_category_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('nomenclature.category', 'nomenclature_category_category_id_foreign') && !is_numeric($find))
                Schema::table('nomenclature.category', function (Blueprint $table) {
                    $table->foreign('category_id')->references('id')->on('nomenclature.category')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('nomenclature.category');


        return false;
    }
};
