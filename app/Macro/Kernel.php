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
            'action' => Database\Blueprints\Foreigns\ActionBlueprint::class,
            'feature' => Database\Blueprints\Foreigns\FeatureBlueprint::class,
            'module' => Database\Blueprints\Foreigns\ModuleBlueprint::class,
            'package' => Database\Blueprints\Foreigns\PackageBlueprint::class,
            'role' => Database\Blueprints\Foreigns\RoleBlueprint::class,
            'user' => Database\Blueprints\Foreigns\UserBlueprint::class,
            'userCreate' => Database\Blueprints\Foreigns\UserCreateBlueprint::class,
            'userDelete' => Database\Blueprints\Foreigns\UserDeleteBlueprint::class,
            'userTimestamps' => Database\Blueprints\Foreigns\UserTimestampsBlueprint::class,
            'userUpdate' => Database\Blueprints\Foreigns\UserUpdateBlueprint::class,

            /**
             * String Blueprints.
             */
            'code' => Database\Blueprints\Strings\CodeBlueprint::class,
            'fullName' => Database\Blueprints\Strings\FullNameBlueprint::class,
            'ipAddress' => Database\Blueprints\Strings\IpAddressBlueprint::class,
            'name' => Database\Blueprints\Strings\NameBlueprint::class,
            'note' => Database\Blueprints\Strings\NoteBlueprint::class,
            'password' => Database\Blueprints\Strings\PasswordBlueprint::class,
            'ref' => Database\Blueprints\Strings\RefBlueprint::class,
            'token' => Database\Blueprints\Strings\TokenBlueprint::class,
            'username' => Database\Blueprints\Strings\UsernameBlueprint::class,

            /**
             * Timestamp Blueprints.
             */
            'expiredAt' => Database\Blueprints\Timestamps\ExpiredAtBlueprint::class,
            'usedAt' => Database\Blueprints\Timestamps\UsedAtBlueprint::class,
        ]
    ];

    /**
     * Register support macro functions.
     * 
     * @var array
     */
    public static $support = [
        'str' => [
            'snakeDotToPascalBackslash' => Support\Str\SnakeDotToPascalBackslash::class,
        ],
    ];
}
