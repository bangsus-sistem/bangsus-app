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
             * Boolean Blueprints.
             */
            'active' => Database\Blueprints\Booleans\ActiveBlueprint::class,
            'state' => Database\Blueprints\Booleans\StateBlueprint::class,

            /**
             * Foreign Blueprints.
             */
            'role' => Database\Blueprints\Strings\RoleBlueprint::class,
            'user' => Database\Blueprints\Strings\UserBlueprint::class,
            'userCreate' => Database\Blueprints\Strings\UserCreateBlueprint::class,
            'userDelete' => Database\Blueprints\Strings\UserDeleteBlueprint::class,
            'userTimestamps' => Database\Blueprints\Strings\UserTimestampsBlueprint::class,
            'userUpdate' => Database\Blueprints\Strings\UserUpdateBlueprint::class,

            /**
             * String Blueprints.
             */
            'code' => Database\Blueprints\Strings\CodeBlueprint::class,
            'fullName' => Database\Blueprints\Strings\FullNameBlueprint::class,
            'name' => Database\Blueprints\Strings\NameBlueprint::class,
            'note' => Database\Blueprints\Strings\NoteBlueprint::class,
            'password' => Database\Blueprints\Strings\PasswordBlueprint::class,
            'token' => Database\Blueprints\Strings\TokenBlueprint::class,
            'username' => Database\Blueprints\Strings\UsernameBlueprint::class,

            /**
             * Timestamp Blueprints.
             */
            'expiredAt' => Database\Blueprints\Timestamps\ExpiredAtBlueprint::class,
            'usedAt' => Database\Blueprints\Timestamps\UsedAtBlueprint::class,
        ]
    ];
}
