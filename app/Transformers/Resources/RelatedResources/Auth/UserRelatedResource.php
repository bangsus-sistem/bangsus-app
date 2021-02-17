<?php

namespace App\Transformers\Resources\RelatedResources\Auth;

use App\Abstracts\Transformers\RelatedResource;
use App\Transformers\Resources\SingleResources\Auth\{
    RoleSingleResource,
    UserSingleResource,
};

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
            'username' => $this->username,
            'full_name' => $this->full_name,
            'active' => $this->active,
            'role' => new RoleSingleResource($this->role),
            'user_create' => new UserSingleResource($this->userCreate),
            'created_at' => $this->created_at,
            'user_update' => new UserSingleResource($this->userUpdate),
            'updated_at' => $this->updated_at,
            'user_delete' => new UserSingleResource($this->userDelete),
            'deleted_at' => $this->deleted_at,
        ];
    }
}
