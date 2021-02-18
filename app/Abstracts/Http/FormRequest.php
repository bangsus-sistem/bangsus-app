<?php

namespace App\Abstracts\Http;

use Illuminate\Foundation\Http\FormRequest as BaseFormRequest;
use Illuminate\Auth\Access\AuthorizationException;
use App\Auth\Permission;

class FormRequest extends BaseFormRequest
{
    /**
     * Override the get validator instance to enable after validation
     * hook.
     * 
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function getValidatorInstance()
    {
        $validator = parent::getValidatorInstance();
        $validator->after(fn ($validator) => $this->afterValidation($validator));
        return $validator;
    }

    /**
     * Master after validation method.
     * 
     * @return void
     */
    protected function afterValidation() {   }
}
