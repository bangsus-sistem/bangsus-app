<?php

namespace App\Transformers\Resources\SingleResources\Auth;

use App\Abstracts\Transformers\Resources\SingleResource;

class RoleSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'name' => $this->name,
            'active' => $this->active,
            'note' => $this->note,
            'role_features' => new RoleFeatureSwiftCollection($this->roleFeatures),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}
