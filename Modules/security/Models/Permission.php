<?php
/**Generate by ASGENS
 * @author amanda
 * @date Wed Nov 13 17:11:18 GMT-05:00 2024
 * @time Wed Nov 13 17:11:18 GMT-05:00 2024
 */


namespace Modules\security\Models;


use App\Models\BaseModel;

use Exception;
use App\Scopes\NonDeletedScope;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * Este es la clase modelo para la tabla security.permissions.
 *
 * Los siguientes son los campos de la tabla 'security.permissions':
 * @property integer $id
 * @property string $permission
 * @property string $description
 * @property string $module
 * @property string $event
 * Los siguientes son las relaciones de este modelo :
 * @property Role_permissions[] $array_role_permissions
 * @property Role[] $array_role
 **/
class Permission extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'security.permissions';

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

    const RELATIONS = ['array_role_permissions', 'array_roles'];

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
    const MODEL = 'Permission';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'permission',
        'description',
        'module',
        'event'
    ];


    /**
     *
     * Get array_role_permissions
     */
    public function array_role_permissions()
    {
        return $this->hasMany(Role_permissions::class, 'permission_id', 'id');
    }


    /* Many to many relationships */


    /**
     *
     * Get array_role
     */
    /**
     * @return BelongsToMany of Roles
     */
    public function array_role()
    {
        return $this->belongsToMany(Role::class, 'security.role_permissions', 'permission_id', 'role_id')
            ->as('role_permissions')
            ->withPivot(Role_permissions::columns)
            ->withGlobalScope('non_deleted', new NonDeletedScope());
    }


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/PermissionRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

