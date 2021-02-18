<?php

namespace App\Http\Requests\Auth\Role;

use App\Abstracts\Http\AuthorizedFormRequest;

class IndexRequest extends AuthorizedFormRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'role';

    /**
     * @var string
     */
    protected $actionRef = 'index';
}
