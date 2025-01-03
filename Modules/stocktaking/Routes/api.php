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

Route::group(['prefix' => 'stocktaking', 'middleware' => ['auth:api', 'checkAccess']], function () {
    Route::get('/', function () {
        return ["message" => "stocktaking"];
    });


    /*Invoice*/
    Route::post('invoice/validate', 'InvoiceController@actionValidate');
    Route::post('invoice/update_multiple', 'InvoiceController@updateMultiple');
    Route::get('invoice/export_excel', 'InvoiceController@export_excel');
    Route::get('invoice/export_pdf', 'InvoiceController@export_pdf');
    Route::delete('invoice/delete_by_id', 'InvoiceController@deleteById');
    Route::post('invoice/{id}', 'InvoiceController@update');
    Route::resource('invoice', 'InvoiceController');


    /*Order_product*/
    Route::post('order_products/validate', 'Order_productController@actionValidate');
    Route::post('order_products/update_multiple', 'Order_productController@updateMultiple');
    Route::get('order_products/export_excel', 'Order_productController@export_excel');
    Route::get('order_products/export_pdf', 'Order_productController@export_pdf');
    Route::delete('order_products/delete_by_id', 'Order_productController@deleteById');
    Route::post('order_products/{id}', 'Order_productController@update');
    Route::resource('order_products', 'Order_productController');


    /*Order*/
    Route::post('order/validate', 'OrderController@actionValidate');
    Route::post('order/update_multiple', 'OrderController@updateMultiple');
    Route::get('order/export_excel', 'OrderController@export_excel');
    Route::get('order/export_pdf', 'OrderController@export_pdf');
    Route::delete('order/delete_by_id', 'OrderController@deleteById');
    Route::post('order/{id}', 'OrderController@update');
    Route::resource('order', 'OrderController');


    /*Request_product*/
    Route::post('request_products/validate', 'Request_productController@actionValidate');
    Route::post('request_products/update_multiple', 'Request_productController@updateMultiple');
    Route::get('request_products/export_excel', 'Request_productController@export_excel');
    Route::get('request_products/export_pdf', 'Request_productController@export_pdf');
    Route::delete('request_products/delete_by_id', 'Request_productController@deleteById');
    Route::post('request_products/{id}', 'Request_productController@update');
    Route::resource('request_products', 'Request_productController');


    /*Request*/
    Route::post('request/validate', 'RequestController@actionValidate');
    Route::post('request/update_multiple', 'RequestController@updateMultiple');
    Route::get('request/export_excel', 'RequestController@export_excel');
    Route::get('request/export_pdf', 'RequestController@export_pdf');
    Route::delete('request/delete_by_id', 'RequestController@deleteById');
    Route::post('request/{id}', 'RequestController@update');
    Route::resource('request', 'RequestController');


    /*Warehouse_product*/
    Route::post('warehouse_products/validate', 'Warehouse_productController@actionValidate');
    Route::post('warehouse_products/update_multiple', 'Warehouse_productController@updateMultiple');
    Route::get('warehouse_products/export_excel', 'Warehouse_productController@export_excel');
    Route::get('warehouse_products/export_pdf', 'Warehouse_productController@export_pdf');
    Route::delete('warehouse_products/delete_by_id', 'Warehouse_productController@deleteById');
    Route::post('warehouse_products/{id}', 'Warehouse_productController@update');
    Route::resource('warehouse_products', 'Warehouse_productController');


});

Route::group(['middleware' => 'api', 'prefix' => 'stocktaking'], function () {
    Route::post('new_order', 'OrderController@store');
});
