<?php

namespace App\Transformers\Resources\SingleResources\Auth;

use App\Abstracts\Transformers\Resources\SingleResource;

class ActionSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ref' => $this->ref,
            'name' => $this->name,
        ];
    }
}
