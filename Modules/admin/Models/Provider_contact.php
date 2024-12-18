<?php

namespace Modules\admin\Models;

use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla admin.provider_contacts.
 *
 * Los siguientes son los campos de la tabla 'admin.provider_contacts':
 * @property integer $id
 * @property string $name
 * @property string $lastname
 * @property string $phone
 * @property string $email
 *
 **/
class Provider_contact extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin.provider_contacts';

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
    const MODEL = 'Provider_contact';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'lastname',
        'phone',
        'email',
    ];

}