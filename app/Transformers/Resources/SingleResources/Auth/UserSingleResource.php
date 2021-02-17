<?php

namespace App\Transformers\Resources\SingleResources\Auth;

use App\Abstracts\Transformers\Resources\SingleResource;

class UserSingleResource extends SingleResource
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
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
