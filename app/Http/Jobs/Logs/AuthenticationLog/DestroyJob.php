<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource;
use App\Database\Repositories\Logs\AuthenticationLogRepository;

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        AuthenticationLog::destroy($request->getBulk('id'));
    }
}
