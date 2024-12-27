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
        $db->statement("DROP VIEW IF EXISTS dashboard.year_sales CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW  dashboard.year_sales(month,total_sales,total_expenses) as 
          WITH months AS (
         SELECT generate_series(1, 12) AS month
        ), sales AS (
         SELECT date_part('month'::text, o.date) AS month,
            sum(o.total_amount) AS total_sales
           FROM stocktaking.orders o
          WHERE date_part('year'::text, o.date) = date_part('year'::text, CURRENT_DATE)
          GROUP BY (date_part('month'::text, o.date))
        ), expenses AS (
         SELECT date_part('month'::text, i.date) AS month,
            sum(i.amount) AS total_expenses
           FROM stocktaking.invoices i
          WHERE date_part('year'::text, i.date) = date_part('year'::text, CURRENT_DATE)
          GROUP BY (date_part('month'::text, i.date))
        )
 SELECT m.month,
    COALESCE(s.total_sales, 0::numeric) AS total_sales,
    COALESCE(e.total_expenses, 0::numeric) AS total_expenses
   FROM months m
     LEFT JOIN sales s ON s.month = m.month::double precision
     LEFT JOIN expenses e ON e.month = m.month::double precision
  ORDER BY m.month");
        $db->commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard.year_sales');
    }
};
