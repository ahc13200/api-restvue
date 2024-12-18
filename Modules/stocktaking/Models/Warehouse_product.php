<?php
/**Generate by ASGENS
 * @author amanda
 * @date Sat Oct 05 18:46:52 GMT-04:00 2024
 * @time Sat Oct 05 18:46:52 GMT-04:00 2024
 */


namespace Modules\stocktaking\Models;


use App\Models\BaseModel;
use Exception;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Modules\admin\Models\Product;
use Modules\stocktaking\Observers\WarehouseObserver;

/**
 * Este es la clase modelo para la tabla stocktaking.warehouse_products.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.warehouse_products':
 * @property integer $id
 * @property integer $product_id
 * @property integer $quantity
 *
 * Los siguientes son las relaciones de este modelo :
 * @property Product $product
 **/


#[ObservedBy([WarehouseObserver::class])]
class Warehouse_product extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.warehouse_products';

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

    const RELATIONS = ['product'];

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
    const MODEL = 'Warehouse_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'quantity',
    ];

    /**
     * Get the product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }


    /* Many to many relationships */


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/Warehouse_productRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

