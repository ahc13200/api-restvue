<?php

namespace Modules\stocktaking\Observers;

use App\Events\StockAlertEvent;
use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Database\Eloquent\Model;

class WarehouseObserver implements ShouldHandleEventsAfterCommit
{
    public function updated(Model $model)
    {
        if ($model->quantity <= 50) {
            $product_name = $model->product->name;
            $product_unit = $model->product->unit->acronym;
            event(new StockAlertEvent($product_name, $model->quantity, $product_unit));
        }
    }
}