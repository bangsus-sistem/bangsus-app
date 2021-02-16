<?php

namespace App\Macro\Database\Blueprints\Timestamps;

use App\Contracts\Macro\Database\BlueprintContract;
use Closure;

class UsedAtBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->timestamps('used_at')->nullable();
            }
        );
    }
}
