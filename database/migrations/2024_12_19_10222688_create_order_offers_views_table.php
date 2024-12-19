<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Order_offers_view
 */
return new class extends Migration
{

/**
     * {@inheritdoc}
     */
    public function up()
    {
        $db=\Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS stocktaking.order_offers_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW stocktaking.order_offers_view(order_id,offer_id,quantity,name,price,image) as 
         SELECT order_products.order_id,
    order_products.offer_id,
    order_products.quantity,
    offers.name,
    offers.price,
    offers.image
   FROM stocktaking.orders
     JOIN stocktaking.order_products ON orders.id = order_products.order_id
     JOIN restaurant.offers ON order_products.offer_id = offers.id");
        $db->commit();
    }

   public function down()
    {
       Schema::dropIfExists('stocktaking.order_offers_view');

    }
};
