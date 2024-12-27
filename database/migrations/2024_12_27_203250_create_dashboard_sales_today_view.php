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
        $db->statement("DROP VIEW IF EXISTS dashboard.dashboard_sales_today CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW  dashboard.dashboard_sales_today(today_sales,yesterday_sales,sales_difference,percentage_change) as 
         SELECT today.total_sales AS today_sales,
    yesterday.total_sales AS yesterday_sales,
    today.total_sales - yesterday.total_sales AS sales_difference,
        CASE
            WHEN today.total_sales = 0::numeric AND yesterday.total_sales = 0::numeric THEN 0::numeric
            WHEN today.total_sales = 0::numeric THEN 0::numeric
            WHEN yesterday.total_sales = 0::numeric THEN 100::numeric
            ELSE round((today.total_sales - yesterday.total_sales) / yesterday.total_sales * 100.0, 2)
        END AS percentage_change
   FROM ( SELECT COALESCE(sum(orders.total_amount), 0::numeric) AS total_sales
           FROM stocktaking.orders
          WHERE orders.date = CURRENT_DATE AND orders.status::text = 'entregada'::text) today,
    ( SELECT COALESCE(sum(orders.total_amount), 0::numeric) AS total_sales
           FROM stocktaking.orders
          WHERE orders.date = (CURRENT_DATE - '1 day'::interval) AND orders.status::text = 'entregada'::text) yesterday");
        $db->commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard.dashboard_sales_today');
    }
};
