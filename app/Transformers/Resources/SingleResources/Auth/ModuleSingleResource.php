<?php

namespace App\Transformers\Resources\SingleResources\Auth;

use App\Abstracts\Transformers\Resources\SingleResource;

class ModuleSingleResource extends SingleResource
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'package' => new PackageSingleResource($this->package),
            'ref' => $this->ref,
            'name' => $this->name,
        ];
    }
}
