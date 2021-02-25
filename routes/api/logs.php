<?php

use Illuminate\Support\Facades\Route;

/**
 * @package  \App\Http\Controllers\Ajax\Logs\AuthenticationLogController
 */
Route::prefix('authentication_log')->group(function () {
    Route::get('', 'AuthenticationLogController@index');
    Route::get('{id}', 'AuthenticationLogController@show');
    Route::delete('', 'AuthenticationLogController@destroy');
});

/**
 * @package  \App\Http\Controllers\Ajax\Logs\RequestMethodController
 */
Route::prefix('request_method')->group(function () {
    Route::get('all', 'RequestMethodController@manifest');
});

/**
 * @package  \App\Http\Controllers\Ajax\Logs\FeatureLogController
 */
Route::prefix('feature_log')->group(function () {
    Route::get('', 'FeatureLogController@index');
    Route::get('{id}', 'FeatureLogController@show');
    Route::delete('', 'FeatureLogController@destroy');
});
