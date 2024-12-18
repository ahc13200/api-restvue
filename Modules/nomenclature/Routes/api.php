<?php

use Illuminate\Http\Request;
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

Route::group(['prefix' => 'nomenclature', 'middleware' => ['auth:api', 'checkAccess']], function () {
    Route::get('/', function () {
        return ["message" => "nomenclature"];
    });


    /*Category*/
    Route::post('category/validate', 'CategoryController@actionValidate');
    Route::post('category/update_multiple', 'CategoryController@updateMultiple');
    Route::get('category/export_excel', 'CategoryController@export_excel');
    Route::get('category/export_pdf', 'CategoryController@export_pdf');
    Route::delete('category/delete_by_id', 'CategoryController@deleteById');
    Route::resource('category', 'CategoryController');

    /*Coin*/
    Route::post('coin/validate', 'CoinController@actionValidate');
    Route::post('coin/update_multiple', 'CoinController@updateMultiple');
    Route::get('coin/export_excel', 'CoinController@export_excel');
    Route::get('coin/export_pdf', 'CoinController@export_pdf');
    Route::delete('coin/delete_by_id', 'CoinController@deleteById');
    Route::resource('coin', 'CoinController');


    /*Delivery*/
    Route::post('delivery/validate', 'DeliveryController@actionValidate');
    Route::post('delivery/update_multiple', 'DeliveryController@updateMultiple');
    Route::get('delivery/export_excel', 'DeliveryController@export_excel');
    Route::get('delivery/export_pdf', 'DeliveryController@export_pdf');
    Route::delete('delivery/delete_by_id', 'DeliveryController@deleteById');
    Route::resource('delivery', 'DeliveryController');

    /*UnitMeasurement*/
    Route::post('unit_measurement/validate', 'UnitMeasurementController@actionValidate');
    Route::post('unit_measurement/update_multiple', 'UnitMeasurementController@updateMultiple');
    Route::get('unit_measurement/export_excel', 'UnitMeasurementController@export_excel');
    Route::get('unit_measurement/export_pdf', 'UnitMeasurementController@export_pdf');
    Route::delete('unit_measurement/delete_by_id', 'UnitMeasurementController@deleteById');
    Route::resource('unit_measurement', 'UnitMeasurementController');


});
