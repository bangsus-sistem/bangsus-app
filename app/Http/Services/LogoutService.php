<?php

namespace App\Http\Services;

use App\Abstracts\Http\Service;
use Illuminate\Support\Facades\Auth;

class LogoutService extends Service
{
    /**
     * @param  \App\Http\Requests\Auth\Logs\AuthenticationLog\StoreLogoutRequest  $request
     * @return void
     */
    public function manage($request)
    {
        Auth::guard('web')->logout();
    }
}
