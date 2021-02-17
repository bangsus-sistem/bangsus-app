<?php

namespace App\Abstracts\Http;

use App\Abstracts\Http\WhereBuilder;

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
     * @return \App\Abstracts\Http\WhereBuilder
     */
    protected function buildWhere()
    {
        return new WhereBuilder;
    }
}
