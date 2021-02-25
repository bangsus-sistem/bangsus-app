<?php

namespace App\Transformers\Resources\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\Resources\SingleResources\Auth\UserSingleResource;

class AuthenticationTokenRelatedResource extends RelatedResource
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
            'user_create' => new UserSingleResource($this->userCreate),
            'created_at' => $this->created_at,
            'user_update' => new UserSingleResource($this->userUpdate),
            'updated_at' => $this->updated_at,
            'used_at' => $this->used_at,
            'expired_at' => $this->expired_at,
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
