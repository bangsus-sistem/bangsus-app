<?php

namespace App\Abstracts\Transformers\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

abstract class PaginatedCollection extends ResourceCollection
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'items' => $this->collection,
            'meta' => [
                'last_page' => $this->lastPage(),
                'first_item' => $this->firstItem(),
                'last_item' => $this->lastItem(),
                'total' => $this->total(),
            ]
        ];
    }
}
