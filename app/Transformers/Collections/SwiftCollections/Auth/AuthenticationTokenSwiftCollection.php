<?php

namespace App\Transformers\Collections\SwiftCollections\Auth;

use App\Transformers\Collections\SwiftCollection;

class AuthenticationTokenSwiftCollection extends SwiftCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\RelatedResources\Auth\AuthenticationTokenRelatedResource::class;
}
