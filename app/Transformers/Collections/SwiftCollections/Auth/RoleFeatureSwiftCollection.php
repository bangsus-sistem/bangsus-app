<?php

namespace App\Transformers\Collections\SwiftCollections\Auth;

use App\Transformers\Collections\SwiftCollection;

class RoleFeatureSwiftCollection extends SwiftCollection
{
    /**
     * @var string
     */
    public $collects = \App\Transformers\Resources\RelatedResources\Auth\RoleFeatureRelatedResource::class;
}
