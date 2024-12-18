<?php

namespace Modules\restaurant\Models;

use Illuminate\Support\Facades\Storage;
use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla restaurant.offer_products_view.
 *
 * Los siguientes son los campos de la tabla 'restaurant.offer_products_view':
 * @property integer $product_id
 * @property integer $offer_id
 * @property string $name
 * @property string $code
 * @property string $quantity
 * @property string $unit
 * @property string $image
 *
 *  Los siguientes son las relaciones de este modelo :
 * @property Offer $offer
 **/
class Offer_products_view extends BaseModel
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurant.offer_products_view';

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

    const RELATIONS = ['offer'];

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
    const MODEL = 'Offer_products_view';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'offer_id',
        'name',
        'code',
        'quantity',
        'unit',
        'image'
    ];

    /**
     * Get the request
     */
    public function offer()
    {
        return $this->hasOne(Offer::class, 'offer_id', 'id');
    }

    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}