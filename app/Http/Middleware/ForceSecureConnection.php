<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class ForceSecureConnection
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        return $request->secure()
            ?   $next($request)
            :   redirect()->secure($request->getRequestUri());
    }
}
