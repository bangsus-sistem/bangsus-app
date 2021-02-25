<?php

namespace App\Http\Jobs\Logs\FeatureLog;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Logs\FeatureLogRelatedResource;
use App\Database\Models\Logs\FeatureLog;

class ShowJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\FeatureLog\ShowRequest  $request
     * @param  int  $id
     * @return \App\Transformers\Resources\RelatedResources\Logs\FeatureLogRelatedResource
     */
    public function handle($request, int $id = 0)
    {
        return new FeatureLogRelatedResource(
            FeatureLog::findOrFail($id)
        );
    }
}
