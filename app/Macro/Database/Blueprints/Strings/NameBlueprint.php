<?php

namespace App\Macro\Database\Blueprints\Strings;

use App\Contracts\Macro\Database\BlueprintContract;
use Closure;

class NameBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                return $this->string('name', 200);
            }
        );
    }
}
