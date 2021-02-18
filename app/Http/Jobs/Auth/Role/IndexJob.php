<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\IndexRequest;
use App\Transformers\Collections\PaginatedCollections\Auth\RolePaginatedCollection;
use App\Database\Repositories\Auth\RoleRepository;

class IndexJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\IndexRequest  $request
     * @return \App\Transformers\Collections\PaginatedCollections\Auth\RolePaginatedCollection
     */
    public function handle(IndexRequest $request)
    {
        return new RolePaginatedCollection(
            RoleRepository::index(
                $this->buildWhere()
                    ->with($request)
                    ->index('code')->mode('string')
                    ->index('name')->mode('string')
                    ->index('active')->mode('boolean')
                    ->done(),
                $this->parseMeta($request)
            )
        );
    }
}
