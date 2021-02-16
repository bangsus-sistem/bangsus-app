<?php

namespace App\Macro;

class Kernel
{
    /**
     * @var array
     */
    public static $database = [

        /**
         * Blueprints.
         */
        'blueprints' => [
            /**
             * String Blueprint.
             */
            'code' => Database\Blueprints\Strings\CodeBlueprint::class,
            'name' => Database\Blueprints\Strings\NameBlueprint::class,
        ]
    ];
}
