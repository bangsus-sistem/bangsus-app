<?php

namespace App\Transformers\Collections\PaginatedCollections\Logs;

use App\Transformers\Collections\PaginatedCollection;

class AuthenticationLogPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\SingleResources\Logs\AuthenticationLogSingleResource::class;
}
