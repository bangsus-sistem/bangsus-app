<?php

namespace App\Transformers\Resources\SingleResources\Logs;

use App\Abstracts\Transformers\Resources\SingleResource;

class RequestMethodSingleResource extends SingleResource
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
