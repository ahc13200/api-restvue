<?php

namespace Modules\admin\Models;

use Illuminate\Support\Facades\Storage;
use Modules\security\Models\Role;
use Modules\security\Models\Role_user;
use Modules\security\Models\User;
use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla admin.worker_user_view.
 *
 * Los siguientes son los campos de la tabla 'admin.worker_user_view':
 * @property integer $id
 * @property integer $user_id
 * @property string $name
 * @property string $image
 * @property string $phone
 * @property string $lastname
 * @property string $username
 * @property string $email
 *
 *  Los siguientes son las relaciones de este modelo :
 * @property User $user
 * @property Worker $worker
 * @property Role[] $array_roles
 **/
class Worker_user_view extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin.worker_user_view';

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

    const RELATIONS = ['worker', 'user', 'array_roles'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;

    protected $appends = ['image_url'];

    /**
     * Model Class Name
     *
     * @var string
     */
    const MODEL = 'Worker_user_view';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'name',
        'image',
        'phone',
        'lastname',
        'username',
        'email'
    ];

    /**
     * Get the user
     */
    public function user()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }


    /**
     * Get the worker
     */
    public function worker()
    {
        return $this->hasOne(Worker::class, 'id');
    }


    /**
     * Get array_roles
     */
    public function array_role()
    {
        return $this->hasMany(Role_user::class, 'user_id', 'user_id');
    }


    /**
     *
     * Get array_worker_area_turn
     */
    public function array_area_turn()
    {
        return $this->hasMany(Worker_area_turn::class, 'worker_id', 'id');
    }


    public function getImageUrlAttribute()
    {
        return $this->image ? Storage::disk('public')->url($this->image) : null;
    }
}