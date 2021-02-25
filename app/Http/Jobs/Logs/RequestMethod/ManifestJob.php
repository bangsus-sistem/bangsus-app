<?php

namespace App\Http\Jobs\Auth\RequestMethod;

use App\Abstracts\Http\Job;
use App\Database\Models\Logs\RequestMethod;

class ManifestJob extends Job
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function handle($request)
    {
        return RequestMethod::all();
    }
}
