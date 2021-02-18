<?php

namespace App\Transformers\Collections\PaginatedCollections\Auth;

use App\Transformers\Collections\PaginatedCollection;

class RolePaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\SingleResources\Auth\RoleSingleResource::class;
}
