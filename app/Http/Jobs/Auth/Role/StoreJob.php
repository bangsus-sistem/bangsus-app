<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\StoreRequest;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Repositories\Auth\RoleRepository;

class StoreJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\StoreRequest  $request
     * @return \App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource
     */
    public function handle(StoreRequest $request)
    {
        return new RoleRelatedResource(
            RoleRepository::create([
                'code' => $request->input('code'),
                'name' => $request->input('name'),
                'active' => $request->boolean('active', true),
                'note' => $request->input('note', ''),
            ])
        );
    }
}
