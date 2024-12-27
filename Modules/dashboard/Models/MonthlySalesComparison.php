<?php

namespace Modules\dashboard\Models;

use App\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla dashboard.dashboard_sales_month.
 *
 * Los siguientes son los campos de la tabla 'dashboard.dashboard_sales_month':
 * @property integer $current_month_sales
 * @property integer $previous_month_sales
 * @property integer $sales_difference
 * @property integer $percentage_change
 * Los siguientes son las relaciones de este modelo :
 **/
class MonthlySalesComparison extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dashboard.dashboard_sales_month';

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
    const MODEL = 'MonthlySalesComparison';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'current_month_sales',
        'previous_month_sales',
        'sales_difference',
        'percentage_change'
    ];

    protected $casts = [
        'current_month_sales' => 'float',
        'previous_month_sales' => 'float',
        'sales_difference' => 'float',
        'percentage_change' => 'float',
    ];
}