<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Worker_user_view
 */
return new class extends Migration {

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $db = \Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS admin.worker_user_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW admin.worker_user_view(image,phone,name,lastname,username,email,user_id,id) as 
         SELECT workers.image,
    workers.phone,
    workers.name,
    workers.lastname,
    users.username,
    users.email,
    users.id AS user_id,
    workers.id
   FROM admin.workers
     JOIN security.users ON workers.user_id = users.id");
        $db->commit();
    }

    public function down()
    {
        Schema::dropIfExists('admin.worker_user_view');

    }
};
