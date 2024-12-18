<?php
/**Generate by ASGENS
 * @author Amanda
 * @date Fri May 31 07:56:17 GMT-04:00 2024
 * @time Fri May 31 07:56:17 GMT-04:00 2024
 */


namespace Modules\admin\Models;


use App\Models\BaseModel;
use Exception;
use Modules\nomenclature\Models\Coin;
use Modules\nomenclature\Models\UnitMeasurement;
use Modules\stocktaking\Models\Ipb;

/**
 * Este es la clase modelo para la tabla admin.provider_products.
 *
 * Los siguientes son los campos de la tabla 'admin.provider_products':
 * @property integer $id
 * @property integer $price
 * @property string $image
 * @property integer $stock_quantity
 * @property integer $product_id
 * @property integer $provider_id
 * Los siguientes son las relaciones de este modelo :
 * @property Product $product
 * @property Provider $provider
 **/
class Provider_product extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin.provider_products';

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

    const RELATIONS = ['product', 'provider', 'array_worker_turn', 'coin'];

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
    const MODEL = 'Provider_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'stock_quantity',
        'product_id',
        'provider_id',
        'coin_id',
    ];

    /**
     * Get the product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Get the provider
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }

    /**
     * Get the coin
     */
    public function coin()
    {
        return $this->belongsTo(Coin::class, 'coin_id', 'id');
    }


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/Provider_productRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }
}

