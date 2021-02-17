<?php

namespace App\Transformers\Collections\SwiftCollections\Auth;

use App\Transformers\Collections\SwiftCollection;

class UserSwiftCollection extends SwiftCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\RelatedResources\Auth\UserRelatedResource::class;
}
