<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Invoice_products table */
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
        $exist_table = $connection->hasTable('stocktaking.invoice_products');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('stocktaking.invoice_products');
            $find=array_search('stocktaking_invoice_products_product_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.invoice_products', 'stocktaking_invoice_products_product_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.invoice_products', function (Blueprint $table) {
                    $table->foreign('product_id')->references('id')->on('admin.products')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('stocktaking.invoice_products');
            $find=array_search('stocktaking_invoice_products_coin_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.invoice_products', 'stocktaking_invoice_products_coin_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.invoice_products', function (Blueprint $table) {
                    $table->foreign('coin_id')->references('id')->on('nomenclature.coins')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('stocktaking.invoice_products');
            $find=array_search('stocktaking_invoice_products_unit_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.invoice_products', 'stocktaking_invoice_products_unit_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.invoice_products', function (Blueprint $table) {
                    $table->foreign('unit_id')->references('id')->on('nomenclature.unit_measurement')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('stocktaking.invoice_products');
            $find=array_search('stocktaking_invoice_products_invoice_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.invoice_products', 'stocktaking_invoice_products_invoice_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.invoice_products', function (Blueprint $table) {
                    $table->foreign('invoice_id')->references('id')->on('stocktaking.invoices')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.invoice_products');


        return false;
    }
};
