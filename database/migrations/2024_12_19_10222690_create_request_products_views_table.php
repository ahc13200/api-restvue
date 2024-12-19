<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Request_products_view
 */
return new class extends Migration
{

/**
     * {@inheritdoc}
     */
    public function up()
    {
        $db=\Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS stocktaking.request_products_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW stocktaking.request_products_view(request_id,product_id,name,code,quantity,unit) as 
         SELECT request_products.request_id,
    products.id AS product_id,
    products.name,
    products.code,
    request_products.quantity,
    unit_measurement.acronym AS unit
   FROM stocktaking.requests
     JOIN stocktaking.request_products ON requests.id = request_products.request_id
     JOIN admin.products ON request_products.product_id = products.id
     JOIN nomenclature.unit_measurement ON products.unit_id = unit_measurement.id");
        $db->commit();
    }

   public function down()
    {
       Schema::dropIfExists('stocktaking.request_products_view');

    }
};
