<?php

namespace Modules\dashboard\Models;

use App\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla dashboard.dashboard_clients.
 *
 * Los siguientes son los campos de la tabla 'dashboard.dashboard_clients':
 * @property integer $current_month_clients
 * @property integer $previous_month_clients
 * @property integer $clients_difference
 * @property integer $percentage_change
 * Los siguientes son las relaciones de este modelo :
 **/
class MonthlyClientComparison extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dashboard.dashboard_clients';

    /**
     * The connection name for the model.
     *
     * @var string|null
     */
    protected $connection = 'db';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */

    public $timestamps = false;


    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = false;

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
    const MODEL = 'MonthlyClientComparison';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'current_month_clients',
        'previous_month_clients',
        'clients_difference',
        'percentage_change'
    ];

    protected $casts = [
        'percentage_change' => 'float'
    ];
}