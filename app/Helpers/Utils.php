<?php

namespace App\Helpers;

use Modules\stocktaking\Models\Warehouse_product;
use JsonMachine\Items;
use JsonMachine\JsonDecoder\ExtJsonDecoder;

class Utils
{
    public static function increment_decrement_quantity_warehouse($model, $action = 'increment')
    {
        foreach ($model->array_products as $product) {
            $warehouseProduct = Warehouse_product::query()->where('product_id', $product->product_id)->first();
            if ($warehouseProduct) {
                if ($action === 'decrement' && $product->quantity > $warehouseProduct->quantity)
                    $warehouseProduct->update(['quantity' => 0]);
                else
                    $warehouseProduct->{$action}('quantity', $product->quantity);
            } else {
                Warehouse_product::create([
                    'product_id' => $product->product_id,
                    'quantity' => $product->quantity,
                ]);
            }
        }
    }

    public static function json_to_string($value)
    {
        return is_string($value) ? json_decode($value, true) : $value;
    }


    public static function loadFromJson($class, $address, $id_attribute = "id")
    {
        $elements = Items::fromFile($address, ['decoder' => new ExtJsonDecoder(true)]);
        foreach ($elements as $p) {
            $class::updateOrCreate(['id' => $p[$id_attribute]], $p);
        }
    }
}