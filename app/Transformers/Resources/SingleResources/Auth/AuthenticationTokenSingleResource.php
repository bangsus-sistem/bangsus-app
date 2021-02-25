<?php

namespace App\Transformers\Resources\SingleResources\Auth;

use App\Abstracts\Transformers\Resources\SingleResource;

class AuthenticationTokenSingleResource extends SingleResource
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
            'token' => $this->token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'used_at' => $this->used_at,
            'expired_at' => $this->expired_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
