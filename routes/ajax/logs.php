<?php

use Illuminate\Support\Facades\Route;

/**
 * @package  \App\Http\Controllers\Ajax\Logs\AuthenticationLogController
 */
Route::prefix('authentication_log')->group(function () {
    Route::get('', 'AuthenticationLogController@index');
    Route::get('{id}', 'AuthenticationLogController@show');
    Route::post('login', 'AuthenticationLogController@storeLogin');
    Route::post('logout', 'AuthenticationLogController@storeLogout');
    Route::post('token', 'AuthenticationLogController@storeToken');
    Route::delete('', 'AuthenticationLogController@destroy');
});

/**
 * @package  \App\Http\Controllers\Ajax\Logs\RequestMethodController
 */
Route::prefix('request_method')->group(function () {
    Route::get('all', 'RequestMethodController@manifest');
});
