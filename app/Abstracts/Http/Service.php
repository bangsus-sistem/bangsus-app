<?php

namespace App\Abstracts\Http;

use Illuminate\Http\Request;

abstract class Service
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return mixed
     */
    abstract public function manage($request);
}
