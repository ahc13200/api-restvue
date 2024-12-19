<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
   Foreign Keys Role_users table */
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
        $exist_table = $connection->hasTable('security.role_users');
        if ($exist_table) {
            $foreignkey_list=Schema::getForeignKeys('security.role_users');
            $find=array_search('security_role_users_role_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('security.role_users', 'security_role_users_role_id_foreign') && !is_numeric($find))
                Schema::table('security.role_users', function (Blueprint $table) {
                    $table->foreign('role_id')->references('id')->on('security.roles')->onDelete('restrict');
                });
            $foreignkey_list=Schema::getForeignKeys('security.role_users');
            $find=array_search('security_role_users_user_id_foreign', array_column(json_decode(json_encode($foreignkey_list),TRUE), 'name'));
            if (!Schema::hasIndex('security.role_users', 'security_role_users_user_id_foreign') && !is_numeric($find))
                Schema::table('security.role_users', function (Blueprint $table) {
                    $table->foreign('user_id')->references('id')->on('security.users')->onDelete('restrict');
                });
           };

    }

   public function down()
    {
        Schema::dropIfExists('security.role_users');


        return false;
    }
};
