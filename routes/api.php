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

define('CLIENT', 'CLIENT');
define('ASSISTANT', 'ASSISTANT');
define('ADMIN', 'ADMIN');

define('AUTH_TOKEN', 'user-auth-token');



Route::group([
    'prefix' => 'auth'

], function ($router) {
    Route::post("dashbord-login", "AuthController@dashboardLogin");
    Route::post("client-login", "AuthController@clientLogin");
    Route::post('logout', 'AuthController@logout');
    Route::get('me', 'AuthController@me');
});
Route::group([
    'namespace' => 'Utils'
], function ($router) {
    Route::post('store-picture', 'ImageController@store');
});

Route::group([
    'middleware' => ['sanctum.verify']
], function ($router) {

    Route::group([
        'prefix' => 'dash',
        'middleware' => ['role:ASSISTANT']
    ], function ($router) {

        Route::group([
            'middleware' => ['role:ADMIN']
        ], function ($router) {

        });
    });
});
