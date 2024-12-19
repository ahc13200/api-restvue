<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Provider_contacts table */
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
        $exist_table = $connection->hasTable('admin.provider_contacts');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('admin.provider_contacts');
            $find=array_search('admin_provider_contacts_provider_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('admin.provider_contacts', 'admin_provider_contacts_provider_id_foreign') && !is_numeric($find))
                Schema::table('admin.provider_contacts', function (Blueprint $table) {
                    $table->foreign('provider_id')->references('id')->on('admin.providers')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('admin.provider_contacts');


        return false;
    }
};
