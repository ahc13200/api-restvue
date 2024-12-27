<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $db=\Illuminate\Support\Facades\DB::connection('db');
        $db->statement('CREATE SCHEMA IF NOT EXISTS dashboard');
        $db->statement("DROP VIEW IF EXISTS dashboard.dashboard_clients CASCADE;");

        $db->statement("CREATE OR REPLACE VIEW  dashboard.dashboard_clients(current_month_clients,previous_month_clients,clients_difference,percentage_change) as 
        SELECT current_month.client_count AS current_month_clients,
    previous_month.client_count AS previous_month_clients,
    current_month.client_count - previous_month.client_count AS clients_difference,
        CASE
            WHEN current_month.client_count = 0 AND previous_month.client_count = 0 THEN 0::numeric
            WHEN current_month.client_count = 0 THEN 0::numeric
            WHEN previous_month.client_count = 0 THEN 100::numeric
            ELSE round((current_month.client_count - previous_month.client_count)::numeric / previous_month.client_count::numeric * 100.0, 2)
        END AS percentage_change
   FROM ( SELECT COALESCE(count(*), 0::bigint) AS client_count
           FROM admin.clients
          WHERE date_part('year'::text, clients.created_at) = date_part('year'::text, CURRENT_DATE) AND date_part('month'::text, clients.created_at) = date_part('month'::text, CURRENT_DATE)) current_month,
    ( SELECT COALESCE(count(*), 0::bigint) AS client_count
           FROM admin.clients
          WHERE date_part('year'::text, clients.created_at) = date_part('year'::text, CURRENT_DATE - '1 mon'::interval) AND date_part('month'::text, clients.created_at) = date_part('month'::text, CURRENT_DATE - '1 mon'::interval)) previous_month");
        $db->commit();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dashboard.dashboard_clients');
    }
};
