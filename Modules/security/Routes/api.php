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

Route::group(['prefix' => 'security', 'middleware' => 'auth:api'], function () {
    Route::get('permission/auth_user', 'PermissionController@getPermissionAuthUser');
});


Route::group(['prefix' => 'security', 'middleware' => ['auth:api', 'checkAccess']], function () {
    Route::get('/', function () {
        return ["message" => "security"];
    });


    /*Permissions*/
    Route::post('permission/validate', 'PermissionController@actionValidate');
    Route::post('permission/update_multiple', 'PermissionController@updateMultiple');
    Route::get('permission/export_excel', 'PermissionController@export_excel');
    Route::get('permission/export_pdf', 'PermissionController@export_pdf');
    Route::delete('permission/delete_by_id', 'PermissionController@deleteById');
    Route::post('permission/{id}', 'PermissionController@update');
    Route::resource('permission', 'PermissionController');


    /*Role_permissions*/
    Route::post('role_permissions/validate', 'Role_permissionsController@actionValidate');
    Route::post('role_permissions/update_multiple', 'Role_permissionsController@updateMultiple');
    Route::get('role_permissions/export_excel', 'Role_permissionsController@export_excel');
    Route::get('role_permissions/export_pdf', 'Role_permissionsController@export_pdf');
    Route::delete('role_permissions/delete_by_id', 'Role_permissionsController@deleteById');
    Route::post('role_permissions/{id}', 'Role_permissionsController@update');
    Route::resource('role_permissions', 'Role_permissionsController');

    /*Role*/
    Route::post('role/validate', 'RoleController@actionValidate');
    Route::post('role/update_multiple', 'RoleController@updateMultiple');
    Route::get('role/export_excel', 'RoleController@export_excel');
    Route::get('role/export_pdf', 'RoleController@export_pdf');
    Route::delete('role/delete_by_id', 'RoleController@deleteById');
    Route::resource('role', 'RoleController');


    /*Role_user*/
    Route::post('role_user/validate', 'Role_userController@actionValidate');
    Route::post('role_user/update_multiple', 'Role_userController@updateMultiple');
    Route::get('role_user/export_excel', 'Role_userController@export_excel');
    Route::get('role_user/export_pdf', 'Role_userController@export_pdf');
    Route::delete('role_user/delete_by_id', 'Role_userController@deleteById');
    Route::resource('role_user', 'Role_userController');


    /*User*/
    Route::post('user/validate', 'UserController@actionValidate');
    Route::post('user/update_multiple', 'UserController@updateMultiple');
    Route::get('user/export_excel', 'UserController@export_excel');
    Route::get('user/export_pdf', 'UserController@export_pdf');
    Route::delete('user/delete_by_id', 'UserController@deleteById');
    Route::resource('user', 'UserController');

});