<?php

namespace Modules\dashboard\Services;

use Modules\dashboard\Models\DailySalesComparison;
use Modules\dashboard\Models\MonthlyClientComparison;
use Modules\dashboard\Models\MonthlyInvoiceComparison;
use Modules\dashboard\Models\MonthlyOrderComparison;
use Modules\dashboard\Models\MonthlySalesComparison;
use Modules\dashboard\Models\YearSales;
use Modules\stocktaking\Models\Order;
use Modules\stocktaking\Models\Warehouse_product;

class DashboardService
{
    public function ordersToDay()
    {
        return Order::query()
            ->where('status', 'entregada')
            ->where('date', today())
            ->count();
    }

    public function salesToDay()
    {
        return Order::query()
            ->where('status', 'entregada')
            ->whereDate('date', today())->sum('total_amount');
    }

    public function products_with_low_stock()
    {
        return Warehouse_product::query()->where('quantity', '<=', 50)
            ->orderByDesc('quantity')
            ->get()
            ->map(function ($item) {
                return [
                    'product' => $item->product->name,
                    'stock' => $item->quantity,
                    'unit' => $item->product->unit->acronym
                ];
            });
    }

    public function get_data_dashboard()
    {
        return [
            'monthlyOrderComparison' => MonthlyOrderComparison::query()->first(),
            'monthlyInvoiceComparison' => MonthlyInvoiceComparison::query()->first(),
            'monthlySalesComparison' => MonthlySalesComparison::query()->first(),
            'dailySalesComparison' => DailySalesComparison::query()->first(),
            'monthlyClientComparison' => MonthlyClientComparison::query()->first(),
            'yearSales' => YearSales::query()->select('total_sales')->get()->map(fn($i) => $i->total_sales),
            'yearExpenses' => YearSales::query()->select('total_expenses')->get()->map(fn($i) => $i->total_expenses),
        ];
    }

}