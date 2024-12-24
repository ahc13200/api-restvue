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
        $db->statement("DROP VIEW IF EXISTS admin.provider_products_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW admin.provider_products_view(id,provider_id,product_id,product_name,image,price,coin_acronym,product_code,stock_quantity,unit_acronym) as 
         SELECT DISTINCT provider_products.id,
    provider_products.provider_id,
    provider_products.product_id,
    products.name AS product_name,
    products.image,
    provider_products.price,
    coins.acronym AS coin_acronym,
    products.code AS product_code,
    provider_products.stock_quantity,
    unit_measurement.acronym AS unit_acronym
   FROM admin.provider_products
     JOIN admin.products ON provider_products.product_id = products.id
     JOIN nomenclature.coins ON provider_products.coin_id = coins.id
     JOIN nomenclature.unit_measurement ON products.unit_id = unit_measurement.id");
        $db->commit();
    }

    public function down()
    {
        Schema::dropIfExists('admin.provider_products_view');

    }
};
