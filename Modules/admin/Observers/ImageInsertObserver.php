<?php

namespace Modules\admin\Observers;

use Illuminate\Contracts\Events\ShouldHandleEventsAfterCommit;
use Illuminate\Database\Eloquent\Model;

class ImageInsertObserver implements ShouldHandleEventsAfterCommit
{
    /**
     * Handle the Model "creating" event.
     */
    public function creating(Model $model): void
    {
        if (request()->file('image')) {
            $this->save_image($model);
        }
    }

    public function updating(Model $model): void
    {
        if (request()->file('image')) {
            $model::withoutEvents(function () use ($model) {
                $this->save_image($model);
            });
        }
    }

    public function save_image($model)
    {
        $name = request()->file('image')->getClientOriginalName();
        $path = request()->file('image')->storeAs('images', $name, 'public');
        $model->image = $path;
        $model->save();
    }
}