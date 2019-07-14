<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin: *');
//Access-Control-Allow-Origin: *
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('items', 'ItmesController@index');
    Route::post('confirm/order', 'OrderController@confirm');
Route::group(['prefix' => 'cart'], function(){
    Route::get('/view', 'CartsController@view');
    Route::post('/create', 'CartsController@create');
    Route::delete('/{id}/delete', 'CartsController@delete');
    Route::put('/{id}/update', 'CartsController@update');
});
