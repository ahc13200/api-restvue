<?php
/**Generate by ASGENS
 * @author Amanda
 * @date Fri May 31 07:56:17 GMT-04:00 2024
 * @time Fri May 31 07:56:17 GMT-04:00 2024
 */


namespace Modules\security\Models;


use App\Models\BaseModel;

use Exception;

/**
 * Este es la clase modelo para la tabla security.role_users.
 *
 * Los siguientes son los campos de la tabla 'security.role_users':
 * @property integer $id
 * @property integer $user_id
 * @property integer $role_id
 * Los siguientes son las relaciones de este modelo :
 * @property Role $role
 * @property User $user
 **/
class Role_user extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security.role_users';

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

    const RELATIONS = ['role', 'user'];

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
    const MODEL = 'Role_user';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'role_id'
    ];

    /**
     * Get the role
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'id');
    }

    /**
     * Get the worker
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }


    /* Many to many relationships */


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/Role_userRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

