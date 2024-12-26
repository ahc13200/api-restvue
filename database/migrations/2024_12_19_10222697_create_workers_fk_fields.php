<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Foreign Keys Workers table */
return new class extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \Illuminate\Support\Facades\DB::connection('db')->statement('CREATE SCHEMA IF NOT EXISTS admin');
        $connection = Schema::connection('db');
        $exist_table = $connection->hasTable('admin.workers');
        if ($exist_table) {
            $foreignkey_list = Schema::getForeignKeys('admin.workers');
            $find = array_search('admin_workers_user_id_foreign', array_column(json_decode(json_encode($foreignkey_list), TRUE), 'name'));
            if (!Schema::hasIndex('admin.workers', 'admin_workers_user_id_foreign') && !is_numeric($find))
                Schema::table('admin.workers', function (Blueprint $table) {
                    $table->foreign('user_id')->references('id')->on('security.users')->onDelete('cascade');
                });
        };

    }

    public function down()
    {
        Schema::dropIfExists('admin.workers');


        return false;
    }
};
