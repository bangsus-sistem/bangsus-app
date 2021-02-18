<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use App\Http\Requests\Logs\AuthenticationLog\IndexRequest;
use App\Transformers\Collections\PaginatedCollections\Logs\AuthenticationLogPaginatedCollection;
use App\Database\Repositories\Logs\AuthenticationLogRepository;

class IndexJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\IndexRequest  $request
     * @return \App\Transformers\Collections\PaginatedCollections\Logs\AuthenticationLogPaginatedCollection
     */
    public function handle(IndexRequest $request)
    {
        return new AuthenticationLogPaginatedCollection(
            AuthenticationLogRepository::index(
                $this->buildWhere()
                    ->with($request)
                    ->index('user_id')->mode('id')
                    ->index('ip_address')->mode('string')
                    ->index('state')->mode('boolean')
                    ->done(),
                $this->parseMeta($request)
            )
        );
    }
}
