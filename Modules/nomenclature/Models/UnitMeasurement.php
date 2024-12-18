<?php
/**Generate by ASGENS
 * @author Amanda
 * @date Fri May 31 07:56:17 GMT-04:00 2024
 * @time Fri May 31 07:56:17 GMT-04:00 2024
 */


namespace Modules\nomenclature\Models;

use Modules\admin\Models\Provider_product;
use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla nomenclature.unit_measurement.
 *
 * Los siguientes son los campos de la tabla 'nomenclature.category':
 * @property integer $id
 * @property string $name
 * @property string $acronym
 *
 * Los siguientes son las relaciones de este modelo :
 * @property Provider_product $provider_product
 **/
class UnitMeasurement extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nomenclature.unit_measurement';

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

    const RELATIONS = ['provider_product'];

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
        'name',
        'acronym'
    ];

    /**
     * Get the provider_product
     */
    public function provider_product()
    {
        return $this->belongsTo(Provider_product::class, 'unit_measurement_id', 'id');
    }


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/UnitMeasurementRule.php');
        if (!isset($rules[$scenario]))
            throw new \Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }
}