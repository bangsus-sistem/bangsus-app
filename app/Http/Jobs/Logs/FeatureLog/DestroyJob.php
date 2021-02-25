<?php

namespace App\Http\Jobs\Logs\FeatureLog;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Logs\FeatureLogRelatedResource;
use App\Database\Repositories\Logs\FeatureLogRepository;

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\FeatureLog\DestroyRequest  $request
     * @return void
     */
    public function handle($request)
    {
        FeatureLog::destroy($request->getBulk('id'));
    }
}
