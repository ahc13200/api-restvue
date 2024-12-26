<?php

namespace Modules\stocktaking\Services;

use Carbon\Carbon;
use Modules\admin\Models\Product;
use Modules\stocktaking\Models\Order;
use Modules\stocktaking\Models\Warehouse_product;

class ReportsService
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

}