<?php

namespace Modules\stocktaking\Models;

use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla stocktaking.request_products_view.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.request_products_view':
 * @property integer $product_id
 * @property integer $request_id
 * @property string $name
 * @property string $code
 * @property string $quantity
 * @property string $unit
 *
 *  Los siguientes son las relaciones de este modelo :
 * @property Request $request
 **/
class Request_products_view extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.request_products_view';

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'db';

    /**
     * The primarykey associated with the table-model.
     *
     * @var integer
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = false;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    const RELATIONS = ['request'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;

    protected $appends = [];

    /**
     * Model Class Name
     *
     * @var string
     */
    const MODEL = 'Request_products_view';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_id',
        'product_id',
        'name',
        'code',
        'quantity',
        'unit'
    ];

    /**
     * Get the request
     */
    public function request()
    {
        return $this->hasOne(Request::class, 'request_id', 'id');
    }
}