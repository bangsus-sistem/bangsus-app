<?php

namespace App\Transformers\Collections\PaginatedCollections\Auth;

use App\Transformers\Collections\PaginatedCollection;

class ApiTokenPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\SingleResources\Auth\ApiTokenSingleResource::class;
}
