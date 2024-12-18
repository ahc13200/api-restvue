<?php

namespace Modules\admin\Models;

use Illuminate\Support\Facades\Storage;
use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla admin.products_view.
 *
 * Los siguientes son los campos de la tabla 'admin.products_view':
 * @property integer $id
 * @property integer $provider_id
 * @property integer $product
 * @property string $product_name
 * @property string $product_code
 * @property string $image
 * @property float $price
 * @property string $coin_acronym
 * @property string $unit_acronym
 *
 *  Los siguientes son las relaciones de este modelo :
 * @property Provider $provider
 **/
class Products_view extends BaseModel
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

    const RELATIONS = ['provider'];

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
        'provider_id',
        'product',
        'product_name',
        'product_code',
        'price',
        'coin_acronym',
        'unit_acronym'
    ];

    /**
     * Get the provider
     */
    public function provider()
    {
        return $this->hasOne(Provider::class, 'provider_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}