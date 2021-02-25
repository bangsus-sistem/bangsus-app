<?php

namespace App\Abstracts\Http;

use Illuminate\Auth\Access\AuthorizationException;
use App\Auth\Permission;

class AuthorizedFormRequest extends FormRequest
{
    /**
     * Default unauthorized message.
     * 
     * @var string
     */
    protected $unauthorizedMessage = 'messages.authorization.failed';
    
    /**
     * Automatically authorize every request.
     * 
     * @return bool
     */
    public function authorize()
    {
        return with(new Permission($this, $this->moduleRef, $this->actionRef))
            ->verify()
            ->log()
            ->result();
    }

    /**
     * Customize the Failed Authorization method with custom message.
     * 
     * @throws \Illuminate\Auth\Access\AuthorizationException
     * @return void
     */
    protected function failedAuthorization()
    {
        throw new AuthorizationException(__($this->unauthorizedMessage));
    }

    /**
     * Return a new rule object for validation.
     * 
     * @param  string  $ruleDottedNamespace
     * @return \Illuminate\Contracts\Validation\Rule
     */
    protected function ruleObject($ruleDottedNamespace, ...$args)
    {
        $ruleObject = $this->getRuleClassName($ruleDottedNamespace);

        return new $ruleObject(...$args);
    }

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
    protected function afterValidation()
    {
        //
    }

    /**
     * Get the rule class name based on dotted, snake case name.
     * 
     * @param  string  $ruleDottedNamespace
     * @return string
     */
    private function getRuleClassName($ruleDottedNamespace)
    {
        return Str::snakeDotToPascalBackslash($ruleDottedNamespace,
            fn ($ruleNamespace) => '\App\Http\Validation\Rules\\'.$ruleNamespace
        );
    }
}
