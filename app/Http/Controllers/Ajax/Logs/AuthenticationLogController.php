<?php

namespace App\Http\Controllers\Ajax\Logs;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Logs\AuthenticationLog\{
    IndexRequest,
    ShowRequest,
    StoreLoginRequest,
    StoreTokenRequest,
    DestroyRequest,
};
use App\Http\Jobs\Logs\AuthenticationLog\{
    IndexJob,
    ShowJob,
    StoreJob,
    DestroyJob,
};
use App\Http\Services\{
    LoginService,
    LogoutService,
};

class AuthenticationLogController extends Controller
{
    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\IndexRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function index(IndexRequest $request)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new IndexJob, $request));
    }

    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\ShowRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShowRequest $request, int $id)
    {
        return $this->buildJsonResponse()
            ->success($this->dispatch(new ShowJob, $request, $id));
    }

    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\StoreLoginRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLogin(StoreLoginRequest $request)
    {
        $this->transmit(new LoginService, $request);

        return $this->buildJsonResponse()
            ->success($this->dispatch(new StoreJob, $request, true));
    }

    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\StoreTokenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeToken(StoreTokenRequest $request)
    {
        $this->transmit(new LoginService, $request);
        
        return $this->buildJsonResponse()
            ->success($this->dispatch(new StoreJob, $request, true));
    }

    /**
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeLogout(Request $request)
    {
        $this->transmit(new LogoutService, $request);
        
        return $this->buildJsonResponse()
            ->success($this->dispatch(new StoreJob, $request, false));
    }

    /**
     * @param  \App\Http\Requests\Logs\AuthenticationLog\DestroyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function destroy(DestroyRequest $request)
    {
        return $this->buildJsonResponse()
            ->noContent();
    }
}
