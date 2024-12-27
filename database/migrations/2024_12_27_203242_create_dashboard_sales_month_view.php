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
        $db->statement("DROP VIEW IF EXISTS dashboard.dashboard_sales_month CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW  dashboard.dashboard_sales_month(current_month_sales,previous_month_sales,sales_difference,percentage_change) as 
        SELECT current_month.total_sales AS current_month_sales,
    previous_month.total_sales AS previous_month_sales,
    current_month.total_sales - previous_month.total_sales AS sales_difference,
        CASE
            WHEN current_month.total_sales = 0::numeric AND previous_month.total_sales = 0::numeric THEN 0::numeric
            WHEN current_month.total_sales = 0::numeric THEN 0::numeric
            WHEN previous_month.total_sales = 0::numeric THEN 100::numeric
            ELSE round((current_month.total_sales - previous_month.total_sales) / previous_month.total_sales * 100.0, 2)
        END AS percentage_change
   FROM ( SELECT COALESCE(sum(orders.total_amount), 0::numeric) AS total_sales
           FROM stocktaking.orders
          WHERE date_part('year'::text, orders.date) = date_part('year'::text, CURRENT_DATE) AND date_part('month'::text, orders.date) = date_part('month'::text, CURRENT_DATE) AND orders.status::text = 'entregada'::text) current_month,
    ( SELECT COALESCE(sum(orders.total_amount), 0::numeric) AS total_sales
           FROM stocktaking.orders
          WHERE date_part('year'::text, orders.date) = date_part('year'::text, CURRENT_DATE - '1 mon'::interval) AND date_part('month'::text, orders.date) = date_part('month'::text, CURRENT_DATE - '1 mon'::interval) AND orders.status::text = 'entregada'::text) previous_month");
        $db->commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard.dashboard_sales_month');
    }
};
