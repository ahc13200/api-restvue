<?php

namespace Modules\nomenclature\Models;

use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla nomenclature.deliveries.
 *
 * Los siguientes son los campos de la tabla 'nomenclature.deliveries':
 * @property integer $id
 * @property string $city
 * @property string $amount
 *
 **/
class Delivery extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nomenclature.deliveries';

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

    const RELATIONS = [];

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
    const MODEL = 'Coin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'city',
        'amount'
    ];


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/DeliveryRule.php');
        if (!isset($rules[$scenario]))
            throw new \Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }
}