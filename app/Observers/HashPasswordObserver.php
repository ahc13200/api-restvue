<?php


namespace App\Observers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class HashPasswordObserver
{
    public function updating(Model $model): void
    {
        $changed_pass = $model->password != null;
        if ($changed_pass)
            $model->password = Hash::make($model->password);
    }

    public function creating(Model $model): void
    {
        $model->password = Hash::make($model->password);
    }

}