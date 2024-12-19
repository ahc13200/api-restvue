<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Products table */
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
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('admin.products');
            $find=array_search('admin_products_category_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('admin.products', 'admin_products_category_id_foreign') && !is_numeric($find))
                Schema::table('admin.products', function (Blueprint $table) {
                    $table->foreign('category_id')->references('id')->on('nomenclature.category')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('admin.products');
            $find=array_search('admin_products_unit_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('admin.products', 'admin_products_unit_id_foreign') && !is_numeric($find))
                Schema::table('admin.products', function (Blueprint $table) {
                    $table->foreign('unit_id')->references('id')->on('nomenclature.unit_measurement')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('admin.products');


        return false;
    }
};
