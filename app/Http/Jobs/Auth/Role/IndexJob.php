<?php

namespace App\Http\Jobs\Auth\Role;

use App\Abstracts\Http\Job;
use App\Http\Requests\Auth\Role\IndexRequest;
use App\Transformers\Collections\PaginatedCollections\Auth\RolePaginatedCollection;
use App\Database\Models\Auth\Role;

class IndexJob extends Job
{
    /**
     * @param  \App\Http\Requests\Auth\Role\IndexRequest  $request
     * @return \App\Transformers\Collections\PaginatedCollections\Auth\RolePaginatedCollection
     */
    public function handle(IndexRequest $request)
    {
        $meta = $this->parseMeta($request);
        
        return new RolePaginatedCollection(
            Role::where(
                $this->buildWhere()
                    ->with($request)
                    ->index('code')->mode('string')
                    ->index('name')->mode('string')
                    ->index('active')->mode('boolean')
                    ->done()
            )  
                ->orderBy($meta->sort, $meta->order)
                ->paginate($meta->count)
        );
    }
}
