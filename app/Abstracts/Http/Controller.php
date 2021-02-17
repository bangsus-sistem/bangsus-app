<?php

namespace App\Abstracts\Http;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

abstract class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @param  \App\Abstracts\Http\Job  $job
     * @param  \Illuminate\Http\Request  $request
     * @param  ...  $args
     * @return mixed
     */
    protected function dispatch(Job $job, $request, ...$args)
    {
        return $job->handle($request, ...$args);
    }
}
