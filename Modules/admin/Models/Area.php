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
 * Este es la clase modelo para la tabla admin.areas.
 *
 * Los siguientes son los campos de la tabla 'admin.areas':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $description
 *
 * Los siguientes son las relaciones de este modelo :
 * @property Worker_area_turn[] $array_worker_area
 * @property User[] $array_worker
 **/
class Area extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin.areas';

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

    const RELATIONS = ['array_worker_area', 'array_worker'];

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
    const MODEL = 'Area';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'description'
    ];


    /**
     *
     * Get array_worker_area
     */
    public function array_worker_area()
    {
        return $this->hasMany(Worker_areaTurn::class, 'area_id', 'id');
    }


    /* Many to many relationships */


    /**
     *
     * Get array_worker
     */
    /**
     * @return BelongsToMany of User
     */
    public function array_worker()
    {
        return $this->belongsToMany(User::class, 'worker_area', 'area_id', 'worker_id')
            ->as('worker_area')
            ->withPivot(Worker_areaTurn::columns)
            ->withGlobalScope('non_deleted', new NonDeletedScope());
    }


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/AreaRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

