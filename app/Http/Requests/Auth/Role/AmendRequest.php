<?php

namespace App\Http\Requests\Auth\Role;

use App\Abstracts\Http\AuthorizedFormRequest;

class AmendRequest extends AuthorizedFormRequest
{
    /**
     * @var string
     */
    protected $moduleRef = 'role';

    /**
     * @var string
     */
    protected $actionRef = 'update';

    /**
     * @return array
     */
    public function rules()
    {
        return [
            'id' => [
                'required',
                'bsb_exists:auth.role',
            ],
            'code' => [
                'required',
                Rule::unique('roles')->ignore($this->input('id')),
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
