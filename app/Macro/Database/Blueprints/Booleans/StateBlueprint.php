<?php

namespace App\Macro\Database\Blueprints\Booleans;

use App\Contracts\Macro\Database\BlueprintContract;
use Closure;

class StateBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->boolean('state', 100);
            }
        );
    }
}
