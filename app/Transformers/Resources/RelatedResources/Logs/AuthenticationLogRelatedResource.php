<?php

namespace App\Transformers\Resources\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\Resources\SingleResources\Auth\UserSingleResource;

class UserRelatedResource extends RelatedResource
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
            'ip_address' => $this->ip_address,
            'state' => $this->state,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
