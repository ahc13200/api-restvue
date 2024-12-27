<?php

namespace Modules\dashboard\Models;

use App\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla dashboard.dashboard_sales_today.
 *
 * Los siguientes son los campos de la tabla 'dashboard.dashboard_sales_today':
 * @property integer $today_sales
 * @property integer $yesterday_sales
 * @property integer $sales_difference
 * @property integer $percentage_change
 * Los siguientes son las relaciones de este modelo :
 **/
class DailySalesComparison extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dashboard.dashboard_sales_today';

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
        'today_sales',
        'yesterday_sales',
        'sales_difference',
        'percentage_change'
    ];

    protected $casts = [
        'today_sales' => 'float',
        'yesterday_sales' => 'float',
        'sales_difference' => 'float',
        'percentage_change' => 'float',
    ];
}