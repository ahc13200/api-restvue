<?php
/**Generate by ASGENS
 * @author Amanda
 * @date Fri May 31 07:56:17 GMT-04:00 2024
 * @time Fri May 31 07:56:17 GMT-04:00 2024
 */


namespace Modules\nomenclature\Models;


use App\Models\BaseModel;

use Exception;
use Modules\admin\Models\Product;

/**
 * Este es la clase modelo para la tabla nomenclature.category.
 *
 * Los siguientes son los campos de la tabla 'nomenclature.category':
 * @property integer $id
 * @property integer $category_id
 * @property string $name
 * @property string $description
 * Los siguientes son las relaciones de este modelo :
 * @property Category $category
 * @property Product[] $array_product
 * @property Category[] $array_category
 **/
class Category extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'nomenclature.category';

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

    const RELATIONS = ['category', 'array_product', 'array_category'];

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
    const MODEL = 'Category';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id',
        'name',
        'description'
    ];

    /**
     * Get the category
     */
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }


    /**
     *
     * Get array_product
     */
    public function array_product()
    {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    /**
     *
     * Get array_category
     */
    public function array_category()
    {
        return $this->hasMany(Category::class, 'category_id', 'id');
    }


    /* Many to many relationships */


    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__ . '/../Rules/CategoryRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

