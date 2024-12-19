<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Offer_products_view
 */
return new class extends Migration
{

/**
     * {@inheritdoc}
     */
    public function up()
    {
        $db=\Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS restaurant.offer_products_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW restaurant.offer_products_view(product_id,offer_id,name,code,quantity,unit,image) as 
         SELECT products.id AS product_id,
    offers.id AS offer_id,
    products.name,
    products.code,
    offer_products.quantity,
    unit_measurement.acronym AS unit,
    products.image
   FROM restaurant.offers
     JOIN restaurant.offer_products ON offers.id = offer_products.offer_id
     JOIN admin.products ON offer_products.product_id = products.id
     JOIN nomenclature.unit_measurement ON offer_products.unit_id = unit_measurement.id");
        $db->commit();
    }

   public function down()
    {
       Schema::dropIfExists('restaurant.offer_products_view');

    }
};
