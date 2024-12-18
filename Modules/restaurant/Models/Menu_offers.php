<?php
/**Generate by ASGENS
*@author Amanda  
*@date Wed Nov 06 10:55:40 GMT-05:00 2024  
*@time Wed Nov 06 10:55:40 GMT-05:00 2024  
*/


namespace Modules\restaurant\Models;


use App\Models\BaseModel;

use Exception;

/**
 * Este es la clase modelo para la tabla restaurant.menu_offers.
 *
 * Los siguientes son los campos de la tabla 'restaurant.menu_offers':
 * @property integer $id
 * @property integer $menu_id
 * @property integer $offer_id
 * Los siguientes son las relaciones de este modelo :
 * @property Menu $menu
 * @property Offer $offer
 **/



class Menu_offers extends BaseModel 
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'restaurant.menu_offers';

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

    const RELATIONS = ['menu','offer'];

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
    const MODEL = 'Menu_offers';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'menu_id',
      'offer_id'
    ];

	 /**
     * Get the menu
     */
	  public function menu()
    {
			return $this->belongsTo(Menu::class,'menu_id','id');
    }

	 /**
     * Get the offer
     */
	  public function offer()
    {
			return $this->belongsTo(Offer::class,'offer_id','id');
    }



     /* Many to many relationships */



    protected function rules($scenario = 'create')
    {
        $rules = include(__DIR__.'/../Rules/Menu_offersRule.php');
        if (!isset($rules[$scenario]))
            throw new Exception('Scenario ' . $scenario . ' not exist');
        return $rules[$scenario];
    }

}

