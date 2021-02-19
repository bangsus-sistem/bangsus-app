<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Http\Requests\Logs\AuthenticationLog\DestroyRequest;
use App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource;
use App\Database\Repositories\Logs\AuthenticationLogRepository;

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\DestroyRequest  $request
     * @return void
     */
    public function handle(DestroyRequest $request)
    {
        $ids = $request->boolean('bulk')
                ?   $request->input('selected_ids')
                :   [$request->input('id')];
        AuthenticationLog::destroy($ids);
    }
}
