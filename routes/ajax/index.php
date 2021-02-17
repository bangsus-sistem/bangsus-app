<?php

use Illuminate\Http\Request;

Route::prefix('auth')
    ->namespace('Auth')
    ->group(base_path('routes/ajax/auth.php'));

Route::prefix('logs')
    ->namespace('Logs')
    ->group(base_path('routes/ajax/logs.php'));
