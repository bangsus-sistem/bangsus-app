<?php

namespace App\Abstracts\Http;

use App\Libs\Http\WhereBuilder;

abstract class Job
{
    /**
     * @param  \Illuminate\Http\Requests  $request
     * @return mixed
     */
    abstract public function handle($request);
    
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
