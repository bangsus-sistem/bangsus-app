<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\ShowRequest;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Repositories\Auth\RoleRepository;

class ShowJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\ShowRequest  $request
     * @param  int|null  $id
     * @return \App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource
     */
    public function handle(ShowRequest $request, ?int $id = null)
    {
        return new RoleRelatedResource(RoleRepository::grab($id));
    }
}
