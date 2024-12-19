<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Role_permissions table */
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
        $exist_table = $connection->hasTable('security.role_permissions');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('security.role_permissions');
            $find=array_search('security_role_permissions_permission_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('security.role_permissions', 'security_role_permissions_permission_id_foreign') && !is_numeric($find))
                Schema::table('security.role_permissions', function (Blueprint $table) {
                    $table->foreign('permission_id')->references('id')->on('security.permissions')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('security.role_permissions');
            $find=array_search('security_role_permissions_role_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('security.role_permissions', 'security_role_permissions_role_id_foreign') && !is_numeric($find))
                Schema::table('security.role_permissions', function (Blueprint $table) {
                    $table->foreign('role_id')->references('id')->on('security.roles')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('security.role_permissions');


        return false;
    }
};
