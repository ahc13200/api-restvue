<?php

namespace Modules\stocktaking\Models;

use App\Scopes\NonDeletedScope;
use Modules\admin\Models\Product;
use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla stocktaking.invoice_products.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.invoice_products':
 * @property integer $id
 * @property integer $invoice_id
 * @property integer $product_id
 * @property integer $coin_id
 * @property integer $unit_id
 * @property integer $quantity
 * @property float $price
 *
 * Los siguientes son las relaciones de este modelo :
 * @property Invoice $invoice
 * @property Product $product
 **/
class Invoice_product extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.invoice_products';

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

    const RELATIONS = ['invoice', 'product'];

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
    const MODEL = 'Invoice_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'invoice_id',
        'product_id',
        'quantity',
        'price',
        'coin_id',
        'unit_id'
    ];

    /**
     * Get the invoice
     */
    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'invoice_id', 'id');
    }

    /**
     * Get the product
     */
    public function product()
    {
        return $this->hasOne(Product::class, 'product_id', 'id');
    }


}