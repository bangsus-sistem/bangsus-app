<?php

namespace App\Http\Requests\Auth\Role;

use App\Abstracts\Http\AuthorizedFormRequest;

class ShowRequest extends AuthorizedFormRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'role';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
