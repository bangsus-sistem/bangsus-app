<?php

namespace App\Contracts\Macro\Database;

use Closure;

interface BlueprintContract
{
    /**
     * @var string
     */
    const MAIN_METHOD = 'register';

    /**
     * @return \Closure
     */
    public static function register() : Closure;
}
