<?php

namespace App\Abstracts\Http;

abstract class Job
{
    /**
     * @param  \Illuminate\Http\Requests  $request
     * @param  ...  $args
     * @return mixed
     */
    abstract public function handle($request, ...$args);
}
