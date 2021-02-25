<?php

namespace App\Abstracts\Http;

use App\Utils\Database\{
    WhereBuilder,
    MetaParser,
};
use Illuminate\Http\Request;
use Closure;
use Illuminate\Support\Facades\DB;

abstract class Job
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function handle($request);
    
    /**
     * Instantiate new Where Builder class.
     * 
     * @return \App\Utils\Database\WhereBuilder
     */
    protected function buildWhere()
    {
        return new WhereBuilder;
    }

    /**
     * Parse the meta.
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return Object
     */
    protected function parseMeta(Request $request)
    {
        return MetaParser::parse($request);
    }

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
