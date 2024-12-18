<?php

namespace Modules\restaurant\Models;


use App\Models\BaseModel;
use Illuminate\Support\Facades\Storage;

/**
 * Este es la clase modelo para la tabla restaurant.popular_offers_view.
 *
 * Los siguientes son los campos de la tabla 'restaurant.popular_offers_view':
 * @property integer $id
 * @property string $name
 * @property string $price
 * @property string $image
 * @property string $description
 * @property string $popularity
 *
 *  Los siguientes son las relaciones de este modelo :
 *
 **/
class Popular_offers_view extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurant.popular_offers_view';

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
    const MODEL = 'Popular_offers_view';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'price',
        'image',
        'description',
        'popularity'
    ];

    protected $casts = [
        'price' => 'float'
    ];


    public function getImageUrlAttribute()
    {
        return Storage::disk('public')->url($this->image);
    }
}