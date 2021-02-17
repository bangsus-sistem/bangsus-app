<?php

namespace App\Abstracts\Http;

use App\Utils\Database\WhereBuilder;

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
     * @return \App\Utils\Database\WhereBuilder
     */
    protected function buildWhere()
    {
        return new WhereBuilder;
    }
}
