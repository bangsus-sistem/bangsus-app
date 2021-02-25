<?php

namespace App\Macro\Support\Str;

use App\Macro\Contracts\Support\StrContract;
use Closure;

class SnakeDotToPascalBackslash implements StrContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($snakeDottedString, ?Closure $callback = null) {
                $explodedSnakeDottedString = explode('.', $snakeDottedString);

                $pascalBackslashString = '';
                foreach ($explodedSnakeDottedString as $i => $str) {
                    $pascalBackslashString .= static::ucfirst(
                        static::camel($str)
                    ).($i < count($explodedSnakeDottedString) - 1 ? '\\' : '');
                }

                if ( ! is_null($callback))
                    $pascalBackslashString = $callback($pascalBackslashString);

                return $pascalBackslashString;
            }
        );
    }
}
