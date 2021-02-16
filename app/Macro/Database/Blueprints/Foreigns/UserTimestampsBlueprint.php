<?php

namespace App\Macro\Database\Blueprints\Foreigns;

use App\Contracts\Macro\Database\BlueprintContract;
use Closure;

class UserTimestampsBlueprint implements BlueprintContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function () {
                $this->userCreate();
                $this->userUpdate();
            }
        );
    }
}
