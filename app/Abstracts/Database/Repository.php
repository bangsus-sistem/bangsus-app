<?php

namespace App\Abstracts\Database;

use Closure;
use Illuminate\Support\Facades\DB;

abstract class Repository
{
    /**
     * @param  \Closure
     * @return mixed
     */
    protected function transaction(Closure $closure)
    {
        return DB::transaction($closure);
    }

    /**
     * @param  array  $data
     * @return Object
     */
    protected function objectify(array $data)
    {
        return (object) $data;
    }
}
