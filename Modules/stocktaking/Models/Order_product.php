<?php
/**Generate by ASGENS
 * @author amanda
 * @date Sat Oct 05 18:46:52 GMT-04:00 2024
 * @time Sat Oct 05 18:46:52 GMT-04:00 2024
 */


namespace Modules\stocktaking\Models;


use App\Models\BaseModel;

use Exception;
use Modules\admin\Models\Product;
use Modules\restaurant\Models\Offer;

/**
 * Este es la clase modelo para la tabla stocktaking.order_products.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.order_products':
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $quantity
 *
 * Los siguientes son las relaciones de este modelo :
 * @property Offer $offer
 * @property Order $order
 **/
class Order_product extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.order_products';

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

    const RELATIONS = ['offer', 'order'];

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
    const MODEL = 'Order_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'offer_id',
        'quantity'
    ];

    /**
     * Get the product
     */
    public function offer()
    {
        return $this->belongsTo(Offer::class, 'offer_id', 'id');
    }

    /**
     * Get the order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }


    /* Many to many relationships */


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/Order_productRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

