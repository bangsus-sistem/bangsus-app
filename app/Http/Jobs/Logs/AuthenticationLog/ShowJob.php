<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Http\Requests\Logs\AuthenticationLog\ShowRequest;
use App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource;
use App\Database\Repositories\Logs\AuthenticationLogRepository;

class ShowJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\ShowRequest  $request
     * @param  int|null  $id
     * @return \App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource
     */
    public function handle(ShowRequest $request, ?int $id = null)
    {
        return new AuthenticationLogRelatedResource(
            AuthenticationLogRepository::grab($id)
        );
    }
}
