<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Providerproducts_view
 */
return new class extends Migration {

    /**
     * {@inheritdoc}
     */
    public function up()
    {
        $db = \Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS admin.products_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW admin.products_view(id,name,code,image,quantity,unit_acronym) as 
         SELECT products.id,
    products.name,
    products.code,
    products.image,
    warehouse_products.quantity,
    unit_measurement.acronym AS unit_acronym
   FROM admin.products
     JOIN stocktaking.warehouse_products ON products.id = warehouse_products.product_id
     JOIN nomenclature.unit_measurement ON products.unit_id = unit_measurement.id");
        $db->commit();
    }

    public function down()
    {
        Schema::dropIfExists('admin.products_view');

    }
};
