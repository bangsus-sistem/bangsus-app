<?php

namespace App\Transformers\Collections\PaginatedCollections\Logs;

use App\Transformers\Collections\PaginatedCollection;

class FeatureLogPaginatedCollection extends PaginatedCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\SingleResources\Logs\FeatureLogSingleResource::class;
}
