<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\ActivateRequest;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Repositories\Auth\RoleRepository;

class ActivateJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\ActivateRequest  $request
     * @param  bool  $active
     * @return \App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource
     */
    public function handle(ActivateRequest $request, bool $active = true)
    {
        return new RoleRelatedResource(
            RoleRepository::activate($request->input('id'), $active)
        );
    }
}
