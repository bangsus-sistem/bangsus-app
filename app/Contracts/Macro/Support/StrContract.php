<?php

namespace App\Contracts\Macro\Support;

use Closure;

interface StrContract
{
    /**
     * Store the main method of the contract for convenient
     * use in the Service Provider.
     * 
     * @var string
     */
    const MAIN_METHOD = 'register';

    /**
     * Register the callback for additional str methods.
     * 
     * @return \Closure
     */
    public static function register() : Closure;
}
