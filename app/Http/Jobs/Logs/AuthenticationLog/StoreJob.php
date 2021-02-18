<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Http\Requests\Logs\AuthenticationLog\StoreRequest;
use App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource;
use App\Database\Repositories\Logs\AuthenticationLogRepository;

class StoreJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\StoreRequest  $request
     * @param  bool  $state
     * @return \App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource
     */
    public function handle(StoreRequest $request, bool $state = true)
    {
        return new AuthenticationLogRelatedResource(
            AuthenticationLogRepository::create([
                'user_id' => $user->id,
                'ip_address' => $request->ip(),
                'state' => $state,
            ])
        );
    }
}
