<?php

namespace App\Http\Requests\Auth\Role;

use App\Abstracts\Http\AuthorizedFormRequest;

class StoreRequest extends AuthorizedFormRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'role';

    /**
     * @var string
     */
    protected $actionRef = 'create';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'code' => [
                'required',
                'max:25',
                'unique:roles,code',
            ],
            'name' => [
                'required',
                'max:200',
            ],
            'active' => [
                'nullable',
                'boolean',
            ],
            'note' => [
                'nullable',
                'max:1000',
            ],
        ];
    }
}
