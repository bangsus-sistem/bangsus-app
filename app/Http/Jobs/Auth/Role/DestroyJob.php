<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\DestroyRequest;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Models\Auth\{
    Role,
    RoleFeature,
};

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\DestroyRequest  $request
     * @return void
     */
    public function handle(DestroyRequest $request)
    {
        $this->transaction(function () use ($request) {
            $ids = $request->getBulk('id');
            RoleFeature::whereIn('role_id', $ids)->delete();
            Role::destroy($ids);
        });
    }
}
