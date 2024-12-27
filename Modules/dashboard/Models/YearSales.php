<?php

namespace Modules\dashboard\Models;

use App\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla dashboard.year_sales.
 *
 * Los siguientes son los campos de la tabla 'dashboard.year_sales':
 * @property integer $month
 * @property integer $total_sales
 * @property integer $total_expenses
 * Los siguientes son las relaciones de este modelo :
 **/
class YearSales extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dashboard.year_sales';

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
    const MODEL = 'YearSales';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'month',
        'total_sales',
        'total_expenses',
    ];

    protected $casts = [
        'total_sales' => 'float',
        'total_expenses' => 'float',
    ];
}