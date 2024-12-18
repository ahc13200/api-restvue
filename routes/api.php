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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::get('', function (Request $request) {
    return ["message"=>"Api in Laravel"];
});
Route::group([
    'middleware' => 'api',
    'prefix' => ''

], function ($router) {
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/logout', [\App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/refresh', [\App\Http\Controllers\AuthController::class, 'refresh']);
    Route::get('/user-profile', [\App\Http\Controllers\AuthController::class, 'userProfile']);

});

Route::group(['middleware' => 'api', 'prefix' => ''], function ($router) {
    Route::post('/telegram/webhook', [\App\Http\Controllers\TelegramBotController::class, 'handle']);
    Route::get('/set-webhook', [\App\Http\Controllers\TelegramBotController::class, 'setWebhook']);
});


Route::group([
    'middleware' =>  ['auth:api'],
    'prefix' => ''
], function () {
    /*Error_logs*/
    Route::get('/error_logs/export_excel', [\App\Http\Controllers\Error_logsController::class,'export_excel']);
    Route::get('/error_logs/export_pdf', [\App\Http\Controllers\Error_logsController::class,'export_pdf']);
    Route::delete('/error_logs/delete_by_id', [\App\Http\Controllers\Error_logsController::class,'deleteById']);
    Route::resource('error_logs', \App\Http\Controllers\Error_logsController::class,['except'=>['store','update']]);
});
