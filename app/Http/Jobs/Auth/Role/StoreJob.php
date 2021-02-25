<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Models\Auth\{
    Role,
    RoleFeature,
};

class StoreJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\StoreRequest  $request
     * @return \App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource
     */
    public function handle($request)
    {
        $role = new Role;
        $this->transaction(function () use ($role, $request) {
            $role->code = $request->input('code');
            $role->name = $request->input('name');
            $role->active = $request->input('active');
            $role->note = $request->input('note');
            $role->save();

            foreach ($request->input('feature_ids') as $featureId) {
                $roleFeature = new RoleFeature;
                $roleFeature->role_id = $role->id;
                $roleFeature->feature_id = $featureId;
                $roleFeature->access = true;
                $roleFeature->save();
            }
        });

        return new RoleRelatedResource($role);
    }
}
