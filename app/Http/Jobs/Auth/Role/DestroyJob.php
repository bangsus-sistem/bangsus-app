<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\DestroyRequest;
use App\Transformers\Resources\RelatedResources\Auth\RoleRelatedResource;
use App\Database\Repositories\Auth\RoleRepository;

class DestroyJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\DestroyRequest  $request
     * @return void
     */
    public function handle(DestroyRequest $request)
    {
        if ($request->input('bulk')) {
            foreach ($request->input('selected_ids') as $id) {
                RoleRepository::destroy($id);
            }
        } else {
            RoleRepository::destroy($request->input('id'));
        }
    }
}
