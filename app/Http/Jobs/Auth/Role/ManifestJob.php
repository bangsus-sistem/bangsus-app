<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use Illuminate\Http\Request;
use App\Transformers\Collections\PaginatedCollections\Auth\RolePaginatedCollection;
use App\Database\Models\Auth\Role;

class ManifestJob extends Job
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Transformers\Collections\PaginatedCollections\Auth\RolePaginatedCollection
     */
    public function handle(Request $request)
    {
        return Role::all();
    }
}
