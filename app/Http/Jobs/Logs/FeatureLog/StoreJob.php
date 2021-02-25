<?php

namespace App\Http\Jobs\Logs\FeatureLog;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Logs\FeatureLogRelatedResource;
use App\Database\Models\Logs\{
    FeatureLog,
    RequestMethod,
};

class StoreJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\FeatureLog\StoreRequest  $request
     * @param  int  $featureId
     * @param  bool  $authorized
     * @return \App\Transformers\Resources\RelatedResources\Logs\FeatureLogRelatedResource
     */
    public function handle($request, int $featureId = 0, bool $authorized = true)
    {
        $user = $request->user();

        $featureLog = new FeatureLog;
        $featureLog->user_id = is_null($user)
            ?   null
            :   $user->id;
        $featureLog->feature_id = $featureId;
        $featureLog->request_method_id = RequestMethod::where(
            'ref', strtolower($request->method())
        )->first()->id;
        $featureLog->payload = $request->all();
        $featureLog->authorized = $authorized;
        $featureLog->ip_address = $request->ip();
        $featureLog->save();

        return new FeatureLogRelatedResource($featureLog);
    }
}
