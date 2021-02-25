<?php

namespace App\Http\Requests\Logs\FeatureLog;

use App\Abstracts\Http\AuthorizedFormRequest;

class ShowRequest extends AuthorizedFormRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'feature_log';

    /**
     * @var string
     */
    protected $actionRef = 'read';
}
