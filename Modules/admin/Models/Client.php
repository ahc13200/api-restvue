<?php
/**Generate by ASGENS
 * @author amanda
 * @date Sat Oct 05 18:46:52 GMT-04:00 2024
 * @time Sat Oct 05 18:46:52 GMT-04:00 2024
 */


namespace Modules\admin\Models;


use App\Models\BaseModel;

use Exception;
use Modules\stocktaking\Models\Order;

/**
 * Este es la clase modelo para la tabla admin.clients.
 *
 * Los siguientes son los campos de la tabla 'admin.clients':
 * @property integer $id
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $province
 * @property string $city
 * @property string $registered_in
 *
 * Los siguientes son las relaciones de este modelo :
 * @property Order[] $array_orders
 **/
class Client extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin.clients';

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

    public $timestamps = true;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    const RELATIONS = ['array_orders'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;

    protected $appends = [];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Model Class Name
     *
     * @var string
     */
    const MODEL = 'Clients';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'phone',
        'address',
        'province',
        'city',
        'registered_in'
    ];


    /**
     *
     * Get array_orders
     */
    public function array_orders()
    {
        return $this->hasMany(Order::class, 'client_id', 'id');
    }


    /* Many to many relationships */


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/ClientRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }


    protected static function boot()
    {
        parent::boot();

        static::updating(function (Client $model) {
            if ($model->isDirty('registered_in')) {
                $model->registered_in = $model->getOriginal('registered_in');
            }
        });
    }

}

