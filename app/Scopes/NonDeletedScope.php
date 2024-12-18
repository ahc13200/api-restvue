<?php


namespace App\Scopes;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class NonDeletedScope implements \Illuminate\Database\Eloquent\Scope
{


    /**
     * @inheritDoc
     */
    public function apply(Builder $builder, Model $model)
    {
        if (array_search('deleted_at', $model->getFillable()))
            $builder->where($model->getTable().'.deleted_at', null);
    }
}
