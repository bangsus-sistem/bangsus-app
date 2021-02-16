<?php

namespace App\Abstracts\Transformers\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class SwiftCollection extends ResourceCollection
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->collection;
    }
}
