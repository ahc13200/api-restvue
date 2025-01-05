<?php


namespace Modules\stocktaking\Services;


use App\Services\BaseService;
use Modules\stocktaking\Models\Order;

class OrderService extends BaseService
{

    public function __construct()
    {
        parent::__construct('Modules\stocktaking\Models\Order');
    }

    public static function sendToWhatsapp($data)
    {
        $order = Order::create($data);

        if ($order) {
            $message = "¡Hola! Acabo de realizar un pedido en su sistema.\n\n" .
                "Detalles del pedido:\n" .
                "- Número de Orden: No. {$order->id}\n" .
                "- Cliente:\n" .
                "     Nombre: {$order->client->name}\n" .
                "     Teléfono: {$order->client->phone}\n" .
                "     Dirección: {$order->client->address}, {$order->client->city}, {$order->client->province}\n\n" .
                "- Productos:\n";

            foreach ($order->array_offers as $offer) {
                $message .= "     - {$offer->quantity} {$offer->name}: {$offer->price} CUP\n";
            }

            $total = $order->delivery_amount + $order->total_amount;
            $message .= "\n" .
                "- Costo de productos: {$order->total_amount} CUP\n" .
                "- Costo de domicilio: {$order->delivery_amount} CUP\n" .
                "- Total a pagar: {$total} CUP\n\n" .
                "- Tipo de pago: {$order->type_payment} CUP\n\n" .
                "Por favor, confirme mi pedido. ¡Gracias!";

            $encodedMessage = rawurlencode($message);
            $number = 50529237;

            return ['success' => true, 'url' => "https://wa.me/{$number}?text={$encodedMessage}"];
        }
        return ['success' => false, 'message' => 'No se pudo crear la orden.',];
    }

}

