<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource;
use App\Database\Models\Logs\AuthenticationLog;

class StoreJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\StoreRequest  $request
     * @param  bool  $state
     * @return \App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource
     */
    public function handle($request, bool $state = true)
    {
        $authenticationLog = new AuthenticationLog;
        $authenticationLog->user_id = $request->input('user_id');
        $authenticationLog->ip_address = $request->ip();
        $authenticationLog->state = $request->input('state');
        $authenticationLog->save();

        return new AuthenticationLogRelatedResource($authenticationLog);
    }
}
