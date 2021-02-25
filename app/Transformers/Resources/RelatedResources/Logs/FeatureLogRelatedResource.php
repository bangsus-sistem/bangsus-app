<?php

namespace App\Transformers\Resources\RelatedResources\Logs;

use App\Abstracts\Transformers\Resources\RelatedResource;
use App\Transformers\Resources\SingleResources\Auth\UserSingleResource;
use App\Transformers\Resources\RelatedResources\Auth\FeatureRelatedResource;

class FeatureLogRelatedResource extends RelatedResource
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
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
