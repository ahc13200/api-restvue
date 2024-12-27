<?php

namespace App\Services;

use Modules\dashboard\Services\DashboardService;

class TelegramBotService
{
    public function __construct(private readonly DashboardService $reportService)
    {
    }

    public function getReports($text)
    {
        switch ($text) {
            case '/start':
                $message = "Hola 👋,  presiona el menú a la izquierda para que puedas ver los reportes del día 😄";
                break;

            case '/orders_today':
                $orders = $this->reportService->ordersToDay();
                $message = "Cantidad de órdenes de hoy: $orders";
                break;

            case '/sales_today':
                $sale_total = $this->reportService->salesToDay();
                $message = "Venta total de hoy: $ $sale_total";
                break;

            case '/low_stock':
                $products = $this->reportService->products_with_low_stock()
                    ->map(fn($p) => "{$p['product']}: {$p['stock']} {$p['unit']}")->join("\n");
                $message = "Productos bajos en stock:\n" . $products;
                break;

            default:
                $message = "Comando no reconocido.";
        }

        return $message;
    }
}