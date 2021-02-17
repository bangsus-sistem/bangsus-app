<?php

namespace App\Abstracts\Http;

use App\Libs\Http\WhereBuilder;

abstract class Job
{
    /**
     * @param  \Illuminate\Http\Requests  $request
     * @param  ...  $args
     * @return mixed
     */
    abstract public function handle($request, ...$args);
    
    /**
     * Instantiate new Where Builder class.
     * 
     * @return \App\Libs\Http\WhereBuilder
     */
    protected function buildWhere()
    {
        return new WhereBuilder;
    }
}
