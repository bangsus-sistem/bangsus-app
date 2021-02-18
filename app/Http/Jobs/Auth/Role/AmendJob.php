<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\AmendRequest;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Repositories\Auth\RoleRepository;

class AmendJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\AmendRequest  $request
     * @return \App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource
     */
    public function handle(AmendRequest $request)
    {
        return new RoleRelatedResource(
            RoleRepository::update($request->input('id'), [
                'code' => $request->input('code'),
                'name' => $request->input('name'),
                'active' => $request->boolean('active', true),
                'note' => $request->input('note', ''),
            ])
        );
    }
}
