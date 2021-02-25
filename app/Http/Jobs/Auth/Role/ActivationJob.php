<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Models\Auth\{
    Role,
    RoleFeature,
};

class ActivationJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\ActivateRequest  $request
     * @param  bool  $active
     * @return \App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource
     */
    public function handle($request, bool $active = true)
    {
        $role = Role::findOrFail($request->input('id'));
        $role->active = $request->input('active');
        $role->save();

        return new RoleRelatedResource($role);
    }
}
