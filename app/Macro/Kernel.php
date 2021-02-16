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
             * Boolean blueprints.
             */
            'active' => Database\Blueprints\Booleans\ActiveBlueprint::class,

            /**
             * Foreign blueprints.
             */
            'role' => Database\Blueprints\Strings\RoleBlueprint::class,
            'user' => Database\Blueprints\Strings\UserBlueprint::class,
            'userCreate' => Database\Blueprints\Strings\UserCreateBlueprint::class,

            /**
             * String Blueprints.
             */
            'code' => Database\Blueprints\Strings\CodeBlueprint::class,
            'fullName' => Database\Blueprints\Strings\FullNameBlueprint::class,
            'name' => Database\Blueprints\Strings\NameBlueprint::class,
            'note' => Database\Blueprints\Strings\NoteBlueprint::class,
            'password' => Database\Blueprints\Strings\PasswordBlueprint::class,
            'username' => Database\Blueprints\Strings\UsernameBlueprint::class,
        ]
    ];
}
