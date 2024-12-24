<?php

namespace Modules\admin\Models;

use App\Models\BaseModel;
use Illuminate\Support\Facades\Storage;


/**
 * Este es la clase modelo para la tabla admin.products_view.
 *
 * Los siguientes son los campos de la tabla 'admin.products_view':
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $image
 * @property integer $quantity
 * @property string $unit_acronym
 *
 **/
class Product_view extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'admin.products_view';

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

    const RELATIONS = [];

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
    const MODEL = 'Products_view';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'code',
        'image',
        'quantity',
        'unit_acronym'
    ];


    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }


}