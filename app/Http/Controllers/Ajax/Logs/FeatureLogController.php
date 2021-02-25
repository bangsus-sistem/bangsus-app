<?php

namespace App\Http\Controllers\Ajax\Logs;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Logs\FeatureLog\{
    IndexRequest,
    ShowRequest,
    DestroyRequest,
};
use App\Http\Jobs\Logs\FeatureLog\{
    IndexJob,
    ShowJob,
    DestroyJob,
};

class FeatureLogController extends Controller
{
    /**
     * @param  \App\Http\Requests\Logs\FeatureLog\IndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new IndexJob, $request));
    }

    /**
     * @param  \App\Http\Requests\Logs\FeatureLog\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, int $id)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new ShowJob, $request, $id));
    }

    /**
     * @param  \App\Http\Requests\Logs\FeatureLog\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        return $this->buildJsonResponse()
            ->noContent();
    }
}
