<?php

namespace App\Macro\Support\Str;

use App\Macro\Contracts\Support\StrContract;
use Closure;

class PluralSnake implements StrContract
{
    /**
     * @return \Closure
     */
    public static function register() : Closure
    {
        return (
            function ($str, ?Closure $callback = null) {
                $str = Str::snake(Str::pluralStudly(Str::studly($field)));

                if ( ! is_null($callback)) $str = $callback($str);

                return $str;
            }
        );
    }
}
