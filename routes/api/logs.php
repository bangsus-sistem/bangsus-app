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
