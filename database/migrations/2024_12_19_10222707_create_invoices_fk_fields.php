<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Invoices table */
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
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('stocktaking.invoices');
            $find=array_search('stocktaking_invoices_provider_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.invoices', 'stocktaking_invoices_provider_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.invoices', function (Blueprint $table) {
                    $table->foreign('provider_id')->references('id')->on('admin.providers')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('stocktaking.invoices');
            $find=array_search('stocktaking_invoices_cancelled_by_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.invoices', 'stocktaking_invoices_cancelled_by_foreign') && !is_numeric($find))
                Schema::table('stocktaking.invoices', function (Blueprint $table) {
                    $table->foreign('cancelled_by')->references('id')->on('admin.workers')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('stocktaking.invoices');
            $find=array_search('stocktaking_invoices_worker_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('stocktaking.invoices', 'stocktaking_invoices_worker_id_foreign') && !is_numeric($find))
                Schema::table('stocktaking.invoices', function (Blueprint $table) {
                    $table->foreign('worker_id')->references('id')->on('admin.workers')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('stocktaking.invoices');


        return false;
    }
};
