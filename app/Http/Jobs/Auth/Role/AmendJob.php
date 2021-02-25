<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Models\Auth\{
    Role,
    RoleFeature,
};

class AmendJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\AmendRequest  $request
     * @return \App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource
     */
    public function handle($request)
    {
        $role = Role::findOrFail($request->input('id'));
        $this->transaction(function () use ($role, $request) {
            $role->code = $request->input('code');
            $role->name = $request->input('name');
            $role->active = $request->input('active');
            $role->note = $request->input('note');
            $role->save();

            $featureIds = $request->input('feature_ids');
            $role->roleFeatures()
                ->whereNotIn('feature_id', $featureIds)
                ->get()
                ->each(function ($roleFeature) {
                    $roleFeature->access = false;
                    $roleFeature->save();
                });

            foreach ($data->feature_ids as $featureId) {
                $roleFeature = $role->roleFeatures()->where([
                    'feature_id' => $featureId
                ])->first();
    
                if (is_null($roleFeature)) {
                    $roleFeature = new RoleFeature;
                    $roleFeature->role_id = $role->id;
                    $roleFeature->feature_id = $featureId;
                }

                $roleFeature->access = true;
                $roleFeature->save();
            }
        });

        return new RoleRelatedResource($role);
    }
}
