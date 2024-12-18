<?php

namespace Modules\stocktaking\Models;

use Illuminate\Support\Facades\Storage;
use Modules\restaurant\Models\Offer;
use Ronu\RestGenericClass\Core\Models\BaseModel;


/**
 * Este es la clase modelo para la tabla stocktaking.order_offers_view.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.order_offers_view':
 * @property integer $order_id
 * @property integer $offer_id
 * @property integer $quantity
 * @property string $name
 * @property float $price
 * @property string $image
 *
 *  Los siguientes son las relaciones de este modelo :
 * @property Order $order
 * @property Offer $offer
 **/
class Order_offers_view extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.order_offers_view';

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

    const RELATIONS = ['order', 'offer'];

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
    const MODEL = 'Order__offers_view';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_id',
        'client_name',
        'client_address',
        'offer_id',
        'quantity',
        'name',
        'price',
        'image'
    ];

    /**
     * Get the order
     */
    public function order()
    {
        return $this->hasOne(Order::class, 'order_id', 'id');
    }


    /**
     * Get the offer
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