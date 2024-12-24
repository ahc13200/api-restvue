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

Route::group(['prefix' => 'admin', 'middleware' => ['auth:api', 'checkAccess']], function () {
    Route::get('/', function () {
        return ["message" => "admin"];
    });


    /*Area*/
    Route::post('area/validate', 'AreaController@actionValidate');
    Route::post('area/update_multiple', 'AreaController@updateMultiple');
    Route::get('area/export_excel', 'AreaController@export_excel');
    Route::get('area/export_pdf', 'AreaController@export_pdf');
    Route::delete('area/delete_by_id', 'AreaController@deleteById');
    Route::resource('area', 'AreaController');


    /*Product*/
    Route::post('product/validate', 'ProductController@actionValidate');
    Route::post('product/update_multiple', 'ProductController@updateMultiple');
    Route::get('product/export_excel', 'ProductController@export_excel');
    Route::get('product/export_pdf', 'ProductController@export_pdf');
    Route::delete('product/delete_by_id', 'ProductController@deleteById');
    Route::get('product/list_product', 'ProductController@list');
    Route::resource('product', 'ProductController');


    /*Provider*/
    Route::post('provider/validate', 'ProviderController@actionValidate');
    Route::post('provider/update_multiple', 'ProviderController@updateMultiple');
    Route::get('provider/export_excel', 'ProviderController@export_excel');
    Route::get('provider/export_pdf', 'ProviderController@export_pdf');
    Route::delete('provider/delete_by_id', 'ProviderController@deleteById');
    Route::resource('provider', 'ProviderController');


    /*Provider_product*/
    Route::post('provider_product/validate', 'Provider_productController@actionValidate');
    Route::post('provider_product/update_multiple', 'Provider_productController@updateMultiple');
    Route::get('provider_product/export_excel', 'Provider_productController@export_excel');
    Route::get('provider_product/export_pdf', 'Provider_productController@export_pdf');
    Route::delete('provider_product/delete_by_id', 'Provider_productController@deleteById');
    Route::resource('provider_product', 'Provider_productController');


    /*Turn*/
    Route::post('turn/validate', 'TurnController@actionValidate');
    Route::post('turn/update_multiple', 'TurnController@updateMultiple');
    Route::get('turn/export_excel', 'TurnController@export_excel');
    Route::get('turn/export_pdf', 'TurnController@export_pdf');
    Route::delete('turn/delete_by_id', 'TurnController@deleteById');
    Route::resource('turn', 'TurnController');


    /*Worker_areaTurn*/
    Route::post('worker_area/validate', 'Worker_areaController@actionValidate');
    Route::post('worker_area/update_multiple', 'Worker_areaController@updateMultiple');
    Route::get('worker_area/export_excel', 'Worker_areaController@export_excel');
    Route::get('worker_area/export_pdf', 'Worker_areaController@export_pdf');
    Route::delete('worker_area/delete_by_id', 'Worker_areaController@deleteById');
    Route::resource('worker_area', 'Worker_areaController');


    /*Worker_turn*/
    Route::post('worker_turn/validate', 'Worker_turnController@actionValidate');
    Route::post('worker_turn/update_multiple', 'Worker_turnController@updateMultiple');
    Route::get('worker_turn/export_excel', 'Worker_turnController@export_excel');
    Route::get('worker_turn/export_pdf', 'Worker_turnController@export_pdf');
    Route::delete('worker_turn/delete_by_id', 'Worker_turnController@deleteById');
    Route::resource('worker_turn', 'Worker_turnController');


    /*Clients*/
    Route::post('client/validate', 'ClientController@actionValidate');
    Route::post('client/update_multiple', 'ClientController@updateMultiple');
    Route::get('client/export_excel', 'ClientController@export_excel');
    Route::get('client/export_pdf', 'ClientController@export_pdf');
    Route::delete('client/delete_by_id', 'ClientController@deleteById');
    Route::post('client/{id}', 'ClientController@update');
    Route::resource('client', 'ClientController');


    /*Worker*/
    Route::post('worker/validate', 'WorkerController@actionValidate');
    Route::post('worker/update_multiple', 'WorkerController@updateMultiple');
    Route::get('worker/export_excel', 'WorkerController@export_excel');
    Route::get('worker/export_pdf', 'WorkerController@export_pdf');
    Route::delete('worker/delete_by_id', 'WorkerController@deleteById');
    Route::get('worker/list_worker', 'WorkerController@list');
    Route::resource('worker', 'WorkerController');


});
