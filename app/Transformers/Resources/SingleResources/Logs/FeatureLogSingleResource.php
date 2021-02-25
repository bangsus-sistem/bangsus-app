<?php

namespace App\Transformers\Resources\SingleResources\Logs;

use App\Abstracts\Transformers\Resources\SingleResource;
use App\Transformers\Resources\SingleResources\Auth\UserSingleResource;
use App\Transformers\Resources\RelatedResources\Auth\FeatureRelatedResource;

class FeatureLogSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'user' => new UserSingleResource($this->user),
            'feature' => new FeatureSingleResource($this->feature),
            'request_method' => new RequestMethodSingleResource($this->requestMethod),
            'payload' => (array) $this->payload,
            'authorized' => $this->authorized,
            'ip_address' => $this->ip_address,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
