<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * Class Invoice_products_view
 */
return new class extends Migration
{

/**
     * {@inheritdoc}
     */
    public function up()
    {
        $db=\Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS stocktaking.invoice_products_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW stocktaking.invoice_products_view(invoice_id,product_id,code,name,price,coin,quantity,unit) as 
        SELECT invoice_products.invoice_id,
    invoice_products.product_id,
    products.code,
    products.name,
    invoice_products.price,
    coins.acronym AS coin,
    invoice_products.quantity,
    unit_measurement.acronym AS unit
   FROM stocktaking.invoice_products
     JOIN stocktaking.invoices ON invoice_products.invoice_id = invoices.id
     JOIN nomenclature.coins ON invoice_products.coin_id = coins.id
     JOIN admin.products ON invoice_products.product_id = products.id
     JOIN nomenclature.unit_measurement ON products.unit_id = unit_measurement.id");
        $db->commit();
    }

   public function down()
    {
       Schema::dropIfExists('stocktaking.invoice_products_view');

    }
};
