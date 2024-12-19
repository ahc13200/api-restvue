<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Popular_offers_view
 */
return new class extends Migration
{

/**
     * {@inheritdoc}
     */
    public function up()
    {
        $db=\Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS restaurant.popular_offers_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW restaurant.popular_offers_view(id,name,price,image,description,popularity) as 
         SELECT order_products.offer_id AS id,
    offers.name,
    offers.price,
    offers.image,
    offers.description,
    count(order_products.offer_id) AS popularity
   FROM stocktaking.order_products
     JOIN restaurant.offers ON order_products.offer_id = offers.id
  GROUP BY order_products.offer_id, offers.name, offers.price, offers.image, offers.description
 HAVING count(order_products.offer_id) >= 3
  ORDER BY (count(order_products.offer_id)) DESC
        ");
        $db->commit();
    }

   public function down()
    {
       Schema::dropIfExists('restaurant.popular_offers_view');

    }
};
