<?php

namespace App\Http\Jobs\Logs\FeatureLog;

use App\Abstracts\Http\Job;
use App\Transformers\Collections\PaginatedCollections\Logs\FeatureLogPaginatedCollection;
use App\Database\Repositories\Logs\FeatureLogRepository;

class IndexJob extends Job
{
    /**
     * @param  \App\Http\Requests\Logs\FeatureLog\IndexRequest  $request
     * @return \App\Transformers\Collections\PaginatedCollections\Logs\FeatureLogPaginatedCollection
     */
    public function handle($request)
    {
        $meta = $this->parseMeta($request);

        return new FeatureLogPaginatedCollection(
            FeatureLog::where(
                $this->buildWhere()
                    ->with($request)
                    ->index('user_id')->mode('id')
                    // Feature
                    ->index('request_method_id')->mode('id')
                    ->index('authorized')->mode('boolean')
                    ->index('ip_address')->mode('string')
                    ->done()
            )
                ->whereHas('feature_id',
                    fn ($query) =>
                        $query->whereHas('module_id',
                            fn ($query) =>
                                $query->where(
                                    $this->buildWhere()
                                        ->with($request)
                                        ->index('package_id')->mode('id')
                                        ->done()
                                )
                        )
                            ->where(
                                $this->buildWhere()
                                    ->with($request)
                                    ->index('module_id')->mode('id')
                                    ->index('action_id')->mode('id')
                                    ->done()
                            )
                )
                ->orderBy($meta->sort, $meta->order)
                ->paginate($meta->count)
        );
    }
}
