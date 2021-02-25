<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource;
use App\Database\Models\Logs\AuthenticationLog;

class ShowJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\ShowRequest  $request
     * @param  int  $id
     * @return \App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource
     */
    public function handle($request, int $id = 0)
    {
        return new AuthenticationLogRelatedResource(
            AuthenticationLog::findOrFail($id)
        );
    }
}
