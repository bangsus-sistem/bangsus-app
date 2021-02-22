<?php

namespace App\Http\Services;

use App\Abstracts\Http\Service;
use App\Http\Requests\Auth\Logs\AuthenticationLog\StoreLoginRequest;
use App\Database\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Exceptions\{
    FailedLoginException,
    UserInactiveException,
};

class LoginService extends Service
{
    /**
     * @param  \App\Http\Requests\Auth\Logs\AuthenticationLog\StoreLoginRequest  $request
     * @throws \App\Exceptions\FailedLoginException
     * @throws \App\Exceptions\UserInactiveException
     * @return void
     */
    public function manage(StoreLoginRequest $request)
    {
        $user = User::where('username', $request->input('username'))->sole();

        switch (true) {
            case is_null($user) :
                throw new FailedLoginException;
                break;
            case ! $user->active:
                throw new UserInactiveException;
                break;
        }

        if ( ! Auth::attempt($request->only('username', 'password')))
            throw new FailedLoginException;
    }
}
