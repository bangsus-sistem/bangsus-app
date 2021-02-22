<?php

namespace App\Transformers\Resources\SingleResources\Logs;

use App\Abstracts\Transformers\Resources\SingleResource;
use App\Transformers\Resources\SingleResources\Auth\UserSingleResource;

class AuthenticationLogSingleResource extends SingleResource
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
            'deleted_at' => $this->deleted_at,
        ];
    }
}
