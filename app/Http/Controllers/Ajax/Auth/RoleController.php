<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\Role\{
    IndexRequest,
    ShowRequest,
    StoreRequest,
    AmendRequest,
    ActivationRequest,
    DestroyRequest,
};
use App\Http\Jobs\Auth\Role\{
    ManifestJob,
    IndexJob,
    ShowJob,
    StoreJob,
    AmendJob,
    ActivationJob,
    DestroyJob,
};

class RoleController extends Controller
{
    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function manifest(Request $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new ManifestJob), $request);
    }

    /**
     * @param  \App\Http\Requests\Auth\Role\IndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new IndexJob, $request));
    }

    /**
     * @param  \App\Http\Requests\Auth\Role\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, int $id)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new ShowJob, $request, $id));
    }

    /**
     * @param  \App\Http\Requests\Auth\Role\StoreRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new StoreJob, $request));
    }

    /**
     * @param  \App\Http\Requests\Auth\Role\AmendRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function amend(AmendRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new AmendJob, $request));
    }

    /**
     * @param  \App\Http\Requests\Auth\Role\ActivationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function reviseActivate(ActivationRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new ActivationJob, $request, true));
    }

    /**
     * @param  \App\Http\Requests\Auth\Role\ActivationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function reviseDeactivate(ActivationRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new ActivationJob, $request, false));
    }

    /**
     * @param  \App\Http\Requests\Auth\Role\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new DestroyJob, $request));
    }
}
