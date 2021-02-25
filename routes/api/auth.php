<?php

use Illuminate\Support\Facades\Route;

/**
 * @package  \App\Http\Controllers\Ajax\Api\RoleController
 */
Route::prefix('role')->group(function () {
    Route::get('all', 'RoleController@manifest');
    Route::get('', 'RoleController@index');
    Route::get('{id}', 'RoleController@show');
    Route::post('', 'RoleController@store');
    Route::put('', 'RoleController@amend');
    Route::patch('activation', 'RoleController@reviseActivation');
    Route::delete('', 'RoleController@destroy');
});
