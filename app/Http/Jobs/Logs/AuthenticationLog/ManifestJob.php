<?php

namespace App\Http\Jobs\Logs\AuthenticationLog;

use App\Abstracts\Http\Job;
use Illuminate\Http\Request;
use App\Transformers\Collections\PaginatedCollections\Logs\AuthenticationLogPaginatedCollection;
use App\Database\Repositories\Logs\AuthenticationLogRepository;

class ManifestJob extends Job
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \App\Transformers\Collections\PaginatedCollections\Logs\AuthenticationLogPaginatedCollection
     */
    public function handle(Request $request)
    {
        return new AuthenticationLogSwiftCollection(
            AuthenticationLogRepository::all()
        );
    }
}
