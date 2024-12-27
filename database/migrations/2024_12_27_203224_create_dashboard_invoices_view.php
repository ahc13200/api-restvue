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
        $db->statement("DROP VIEW IF EXISTS dashboard.dashboard_invoices_view CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW  dashboard.dashboard_invoices_view(current_month_invoices,previous_month_invoices,invoices_difference,percentage_change) as 
         SELECT current_month.total_invoices AS current_month_invoices,
    previous_month.total_invoices AS previous_month_invoices,
    current_month.total_invoices - previous_month.total_invoices AS invoices_difference,
        CASE
            WHEN current_month.total_invoices = 0 AND previous_month.total_invoices = 0 THEN 0::numeric
            WHEN current_month.total_invoices = 0 THEN 0::numeric
            WHEN previous_month.total_invoices = 0 THEN 100::numeric
            ELSE round((current_month.total_invoices - previous_month.total_invoices)::numeric / previous_month.total_invoices::numeric * 100.0, 2)
        END AS percentage_change
   FROM ( SELECT COALESCE(count(*), 0::bigint) AS total_invoices
           FROM stocktaking.invoices
          WHERE date_part('year'::text, invoices.date) = date_part('year'::text, CURRENT_DATE) AND date_part('month'::text, invoices.date) = date_part('month'::text, CURRENT_DATE) AND invoices.status::text = 'aprobada'::text) current_month,
    ( SELECT COALESCE(count(*), 0::bigint) AS total_invoices
           FROM stocktaking.invoices
          WHERE date_part('year'::text, invoices.date) = date_part('year'::text, CURRENT_DATE - '1 mon'::interval) AND date_part('month'::text, invoices.date) = date_part('month'::text, CURRENT_DATE - '1 mon'::interval) AND invoices.status::text = 'aprobada'::text) previous_month");
        $db->commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard.dashboard_invoices_view');
    }
};
