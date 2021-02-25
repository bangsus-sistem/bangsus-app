<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Transformers\Collections\PaginatedCollections\Auth\RolePaginatedCollection;
use App\Database\Models\Auth\Role;

class ManifestJob extends Job
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle($request)
    {
        return Role::all();
    }
}
