<?php

namespace App\Http\Controllers\Ajax\Auth;

use App\Abstracts\Http\Controller;
use Illuminate\Http\Request;
use App\Http\Jobs\Logs\RequestMethod\ManifestJob;

class RequestMethodController extends Controller
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
}
