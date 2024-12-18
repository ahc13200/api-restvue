<?php
/**Generate by ASGENS
 * @author amanda
 * @date Sat Oct 05 18:46:52 GMT-04:00 2024
 * @time Sat Oct 05 18:46:52 GMT-04:00 2024
 */


namespace Modules\stocktaking\Models;


use App\Helpers\Utils;
use App\Models\BaseModel;
use App\Scopes\NonDeletedScope;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Auth;
use Modules\admin\Models\Product;
use Modules\admin\Models\Provider;
use Modules\admin\Models\Worker;
use Modules\nomenclature\Models\Coin;
use Modules\nomenclature\Models\UnitMeasurement;

/**
 * Este es la clase modelo para la tabla stocktaking.invoices.
 *
 * Los siguientes son los campos de la tabla 'stocktaking.invoices':
 * @property integer $id
 * @property integer $provider_id
 * @property integer $amount
 * @property string $code
 * @property string $status
 * @property integer $worker_id
 * @property string $cancel_description
 * @property integer $cancelled_by
 *
 * Los siguientes son las relaciones de este modelo :
 * @property Product $product
 * @property Worker $worker
 * @property Warehouse_product[] $array_warehouse_products
 * @property Product[] $array_product
 * @property Provider[] $array_provider
 **/
class Invoice extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stocktaking.invoices';

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

    public $timestamps = true;


    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    const RELATIONS = ['product', 'provider', 'worker', 'array_warehouse_products', 'array_products', 'array_providers'];

    /**
     * The number of models to return for pagination.
     *
     * @var int
     */
    protected $perPage = 15;

    protected $appends = [];

    protected $hidden = ['created_at', 'updated_at'];

    /**
     * Model Class Name
     *
     * @var string
     */
    const MODEL = 'Invoice';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'product_id',
        'provider_id',
        'quantity',
        'amount',
        'code',
        'status',
        'worker_id',
        'cancel_description',
        'cancelled_by'
    ];

    /**
     * Get the product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }

    /**
     * Get the provider
     */
    public function provider()
    {
        return $this->belongsTo(Provider::class, 'provider_id', 'id');
    }


    /**
     * Get the worker
     */
    public function worker()
    {
        return $this->belongsTo(Worker::class, 'worker_id', 'id');
    }

    /**
     * Get the worker
     */
    public function worker_cancel()
    {
        return $this->belongsTo(Worker::class, 'cancelled_by', 'id');
    }


    /**
     *
     * Get array_warehouse_products
     */
    public function invoice_product()
    {
        return $this->hasMany(Invoice_product::class, 'invoice_id', 'id');
    }

    /**
     *
     * Get array_warehouse_products
     */
    public function array_warehouse_products()
    {
        return $this->hasMany(Warehouse_product::class, 'invoice_id', 'id');
    }



    /* Many to many relationships */


    /**
     *
     * Get array_product
     */
    public function array_products()
    {
        return $this->hasMany(Invoice_products_view::class, 'invoice_id', 'id');
    }

    /**
     *
     * Get array_provider
     */
    /**
     * @return BelongsToMany of Providers
     */
    public function array_provider()
    {
        return $this->belongsToMany(Provider::class, 'warehouse_products', 'invoice_id', 'provider_id')
            ->as('warehouse_products')
            ->withPivot(Warehouse_product::columns)
            ->withGlobalScope('non_deleted', new NonDeletedScope());
    }


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/InvoiceRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }


    private static function formattedProducts()
    {
        $products = request()->get('array_products');
        return array_map(function ($item) {
            $item['product_id'] = $item['id'] ?? $item['product_id'];
            $item['coin_id'] = Coin::query()->where('acronym', $item['coin'])->value('id');
            $item['unit_id'] = UnitMeasurement::query()->where('acronym', $item['unit'])->value('id');
            return $item;
        }, $products);
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub


        static::creating(function (Invoice $model) {
            $model->worker_id = request()->get('worker_id') ? request()->get('worker_id') : Auth::user()->worker->id;
            $model->status = "pendiente";
            $model->date = request()->get('date') ? request()->get('date') : Carbon::now();
        });

        static::created(function (Invoice $model) {
            $products = self::formattedProducts();
            $model->invoice_product()->createMany($products);
        });

        static::updating(function (Invoice $model) {
            $status = $model->status;
            $status_before = $model->getOriginal('status');

            if ($model->status === 'aprobada' && $status_before === 'pendiente') {
                Utils::increment_decrement_quantity_warehouse($model, 'increment');
            } elseif ($status === 'cancelada' && $status_before === 'aprobada') {
                Utils::increment_decrement_quantity_warehouse($model, 'decrement');
            }
        });

        static::updated(function (Invoice $model) {
            //products
            $products = self::formattedProducts();
            if (!$model->isDirty('status')) {
                $product_ids = collect($products)->whereNotNull('product_id')->map(fn($item) => $item['product_id'])->toArray();
                $model->invoice_product()->whereNotIn('id', $product_ids)->delete();
                foreach ($products as $product) {
                    $product_id = $product['id'] ?? null;
                    $model->invoice_product()->updateOrCreate(['id' => $product_id], $product);
                }
            }
        });
    }


}

