<?php

namespace App\Http\Requests\Logs\AuthenticationLog;

use App\Abstracts\Http\AuthorizedFormRequest;

class ShowRequest extends AuthorizedFormRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'authentication_log';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
