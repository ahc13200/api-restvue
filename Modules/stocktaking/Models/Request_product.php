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
use Modules\admin\Models\Products_view;

/**
 * Este es la clase modelo para la tabla stocktaking.request_products.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.request_products':
 * @property integer $id
 * @property integer $request_id
 * @property integer $product_id
 * @property integer $quantity
 * Los siguientes son las relaciones de este modelo :
 * @property Request $request
 * @property Product $product
 **/
class Request_product extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.request_products';

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

    const RELATIONS = ['request', 'product'];

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
    const MODEL = 'Request_product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'request_id',
        'product_id',
        'quantity'
    ];

    /**
     * Get the request
     */
    public function request()
    {
        return $this->belongsTo(Request::class, 'request_id', 'id');
    }

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
        $rules = include(__DIR__ . '/../Rules/Request_productRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

