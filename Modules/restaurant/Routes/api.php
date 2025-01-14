<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'restaurant', 'middleware' => ['auth:api', 'checkAccess']], function () {
    Route::get('/', function () {
        return ["message" => "restaurant"];
    });


    /*Menu*/
    Route::post('menu/validate', 'MenuController@actionValidate');
    Route::post('menu/update_multiple', 'MenuController@updateMultiple');
    Route::get('menu/export_excel', 'MenuController@export_excel');
    Route::get('menu/export_pdf', 'MenuController@export_pdf');
    Route::delete('menu/delete_by_id', 'MenuController@deleteById');
    Route::post('menu/{id}', 'MenuController@update');
    Route::resource('menu', 'MenuController');


    /*Menu_offers*/
    Route::post('menu_offers/validate', 'Menu_offersController@actionValidate');
    Route::post('menu_offers/update_multiple', 'Menu_offersController@updateMultiple');
    Route::get('menu_offers/export_excel', 'Menu_offersController@export_excel');
    Route::get('menu_offers/export_pdf', 'Menu_offersController@export_pdf');
    Route::delete('menu_offers/delete_by_id', 'Menu_offersController@deleteById');
    Route::post('menu_offers/{id}', 'Menu_offersController@update');
    Route::resource('menu_offers', 'Menu_offersController');


    /*Offer_products*/
    Route::post('offer_products/validate', 'Offer_productsController@actionValidate');
    Route::post('offer_products/update_multiple', 'Offer_productsController@updateMultiple');
    Route::get('offer_products/export_excel', 'Offer_productsController@export_excel');
    Route::get('offer_products/export_pdf', 'Offer_productsController@export_pdf');
    Route::delete('offer_products/delete_by_id', 'Offer_productsController@deleteById');
    Route::post('offer_products/{id}', 'Offer_productsController@update');
    Route::resource('offer_products', 'Offer_productsController');


    /*Offer*/
    Route::post('offer/validate', 'OfferController@actionValidate');
    Route::post('offer/update_multiple', 'OfferController@updateMultiple');
    Route::get('offer/export_excel', 'OfferController@export_excel');
    Route::get('offer/export_pdf', 'OfferController@export_pdf');
    Route::delete('offer/delete_by_id', 'OfferController@deleteById');
    Route::post('offer/{id}', 'OfferController@update');
    Route::resource('offer', 'OfferController');


});

Route::group(['middleware' => ['api'], 'prefix' => 'restaurant'], function () {
    Route::get('menu_list', 'MenuController@index');
    Route::get('offer_detail/{offer_id}', 'OfferController@show');
    Route::get('popular_offers', 'OfferController@popular_dishes');
    Route::get('search', 'OfferController@search_offers');
});
