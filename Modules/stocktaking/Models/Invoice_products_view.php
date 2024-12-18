<?php

namespace Modules\stocktaking\Models;

use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla stocktaking.invoice_products_view.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.invoice_products_view':
 * @property integer $id
 * @property integer $invoice_id
 * @property string $name
 * @property string $code
 * @property string $quantity
 * @property float $price
 * @property string $coin
 * @property string $unit
 *
 *  Los siguientes son las relaciones de este modelo :
 * @property Invoice $invoice
 **/
class Invoice_products_view extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.invoice_products_view';

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

    const RELATIONS = ['invoice'];

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
    const MODEL = 'Products_view';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_id',
        'name',
        'code',
        'quantity',
        'price',
        'coin',
        'unit'
    ];

    /**
     * Get the invoice
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'invoice_id', 'id');
    }
}