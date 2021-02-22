<?php

namespace App\Transformers\Collections\SwiftCollections\Logs;

use App\Transformers\Collections\SwiftCollection;

class AuthenticationLogSwiftCollection extends SwiftCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\RelatedResources\Logs\AuthenticationLogRelatedResource::class;
}
