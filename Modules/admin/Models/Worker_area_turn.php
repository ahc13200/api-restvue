<?php
/**Generate by ASGENS
 * @author Amanda
 * @date Fri May 31 07:56:17 GMT-04:00 2024
 * @time Fri May 31 07:56:17 GMT-04:00 2024
 */


namespace Modules\admin\Models;


use App\Models\BaseModel;

use Exception;
use App\Scopes\NonDeletedScope;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\security\Models\User;

/**
 * Este es la clase modelo para la tabla admin.worker_area_turns.
 *
 * Los siguientes son los campos de la tabla 'admin.worker_area_turns':
 * @property integer $id
 * @property integer $worker_id
 * @property integer $area_id
 * @property integer $turn_id
 * Los siguientes son las relaciones de este modelo :
 * @property Area $area
 * @property User $worker
 * @property Turn $turn
 **/
class Worker_area_turn extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin.worker_area_turns';

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

    const RELATIONS = ['area', 'worker', 'array_worker_turn', 'array_turn'];

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
    const MODEL = 'Worker_areaTurn';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'worker_id',
        'area_id',
        'turn_id'
    ];

    /**
     * Get the area
     */
    public function area()
    {
        return $this->belongsTo(Area::class, 'area_id', 'id');
    }

    /**
     * Get the worker
     */
    public function worker()
    {
        return $this->belongsTo(User::class, 'worker_id', 'id');
    }


    /**
     * Get the turn
     */
    public function turn()
    {
        return $this->belongsTo(Turn::class, 'turn_id', 'id');
    }


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/Worker_areaRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

