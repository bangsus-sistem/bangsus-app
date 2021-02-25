<?php

namespace App\Transformers\Collections\SwiftCollections\Auth;

use App\Transformers\Collections\SwiftCollection;

class ApiTokenSwiftCollection extends SwiftCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\RelatedResources\Auth\ApiTokenRelatedResource::class;
}
