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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

/**
 * Prefix APIs Version 0
 */
Route::post('v0/oauth/register_grant_client', 'Auth\BasicAuthController@register_grant_client')->name('oauth/register_grant_client');
Route::group(['prefix' => 'v0'], function () {
    Route::post('/oauth/authorize', 'Auth\BasicAuthController@login')->name('oauth/authorize');
});
Route::group([
    'middleware' => 'api_key'
], function() {
    Route::get('user', 'Auth\BasicAuthController@user');
});

Route::group(['prefix' => 'v0', 'middleware' => ['api_key']], function () {
    Route::get('test', function() {
    });
});
