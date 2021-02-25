<?php

namespace App\Http\Requests\Auth\FeatureLog;

use App\Abstracts\Http\AuthorizedFormRequest;
use App\Utils\Http\BulkActionAfterHandler;

class DestroyRequest extends AuthorizedFormRequest
{   
    use BulkActionAfterHandler;

    /**
     * @var string
     */
    protected $moduleRef = 'feature_log';

    /**
     * @var string
     */
    protected $actionRef = 'delete';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            // Single action
            'id' => [
                'required_without:selected_ids',
                'bsb_exists:logs.feature_log',
            ],
            // Bulk action
            'selected_ids' => [
                'required_without:id',
                'array',
            ],
            'selected_ids.*' => [
                'required_with:selected_ids',
                'bsb_exists:logs.feature_log',
            ]
        ];
    }
}
