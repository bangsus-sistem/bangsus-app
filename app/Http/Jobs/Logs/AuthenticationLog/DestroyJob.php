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
        if ($request->input('bulk')) {
            foreach ($request->input('selected_ids') as $id) {
                AuthenticationLogRepository::destroy($id);
            }
        } else {
            AuthenticationLogRepository::destroy($request->input('id'));
        }
    }
}
