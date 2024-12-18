<?php
/**Generate by ASGENS
 * @author Amanda
 * @date Wed Nov 06 10:55:40 GMT-05:00 2024
 * @time Wed Nov 06 10:55:40 GMT-05:00 2024
 */


namespace Modules\restaurant\Models;


use App\Models\BaseModel;

use Exception;
use Modules\admin\Models\Product;
use Modules\nomenclature\Models\UnitMeasurement;

/**
 * Este es la clase modelo para la tabla restaurant.offer_products.
 *
 * Los siguientes son los campos de la tabla 'restaurant.offer_products':
 * @property integer $id
 * @property integer $offer_id
 * @property integer $product_id
 * @property integer $quantity
 * Los siguientes son las relaciones de este modelo :
 * @property Product $product
 * @property Offer $offer
 **/
class Offer_products extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurant.offer_products';

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

    const RELATIONS = ['product', 'offer'];

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
    const MODEL = 'Offer_products';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_id',
        'product_id',
        'quantity',
        'unit_id'
    ];

    /**
     * Get the product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Get the offer
     */
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }


    /**
     * Get the offer
     */
    public function unit()
    {
        return $this->belongsTo(UnitMeasurement::class, 'unit_id', 'id');
    }


    /* Many to many relationships */


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/Offer_productsRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

