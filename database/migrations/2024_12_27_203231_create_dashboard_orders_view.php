<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $db = \Illuminate\Support\Facades\DB::connection('db');
        $db->statement("DROP VIEW IF EXISTS dashboard.dashboard_orders_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW  dashboard.dashboard_orders_view(current_month_orders,previous_month_orders,orders_difference,percentage_change) as 
         SELECT current_month.total_orders AS current_month_orders,
    previous_month.total_orders AS previous_month_orders,
    current_month.total_orders - previous_month.total_orders AS orders_difference,
        CASE
            WHEN current_month.total_orders = 0 AND previous_month.total_orders = 0 THEN 0::numeric
            WHEN current_month.total_orders = 0 THEN 0::numeric
            WHEN previous_month.total_orders = 0 THEN 100::numeric
            ELSE round((current_month.total_orders - previous_month.total_orders)::numeric * 100.0 / previous_month.total_orders::numeric, 2)
        END AS percentage_change
   FROM ( SELECT count(*) AS total_orders
           FROM stocktaking.orders
          WHERE date_part('year'::text, orders.date) = date_part('year'::text, CURRENT_DATE) AND date_part('month'::text, orders.date) = date_part('month'::text, CURRENT_DATE)) current_month,
    ( SELECT count(*) AS total_orders
           FROM stocktaking.orders
          WHERE date_part('year'::text, orders.date) = date_part('year'::text, CURRENT_DATE - '1 mon'::interval) AND date_part('month'::text, orders.date) = date_part('month'::text, CURRENT_DATE - '1 mon'::interval)) previous_month");
        $db->commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard.dashboard_orders_view');
    }
};
