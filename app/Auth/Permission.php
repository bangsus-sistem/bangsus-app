<?php

namespace App\Abstracts\Http;

use App\Database\Models\Auth\User;
use App\Database\Models\System\Feature;
use App\Database\Models\Auth\RoleAuthorization;
use App\Database\Models\System\FeatureLog;
use LogicException;
use App\Exceptions\RequestAuthorizationException;

class Permission
{
    /**
     * @var \Illuminate\Http\Request
     */
    private $request;

    /**
     * @var string
     */
    private $moduleRef;

    /**
     * @var string
     */
    private $actionRef;

    /**
     * @var \App\Database\Models\Auth\Role
     */
    private $role;

    /**
     * @var \App\Database\Models\System\Feature
     */
    private $requestedFeature;

    /**
     * @var \App\Database\Models\Auth\RoleAuthorization
     */
    private $roleAuthorization;

    /**
     * @var bool
     */
    private $result;

    /**
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $moduleRef
     * @param  string  $actionRef
     */
    public function __construct($request, string $moduleRef, string $actionRef)
    {
        $this->request = $request;
        $this->moduleRef = $moduleRef;
        $this->actionRef = $actionRef;

        $this->boot();
    }

    /**
     * @return void
     */
    private function boot()
    {
        $this->setUser();
        $this->setRole();
        $this->setRequestedFeature();
    }

    /**
     * @return void
     */
    private function setUser()
    {
        $this->user = User::findOrFail($this->request->user()->id);
    }

    /**
     * @return void
     */
    private function setRole()
    {
        if (is_null($this->user))
            throw new LogicException('The user must be set before role setting');
        $this->role = $this->user->role;
    }

    /**
     * @return void
     */
    private function setRequestedFeature()
    {
        $feature = Feature::whereHas(
            'module',
            fn ($query) => $query->where('ref', $this->moduleRef)
        )
            ->whereHas(
                'action',
                fn ($query) => $query->where('ref', $this->actionRef)
            )
            ->first();
        
        if (is_null($feature))
            throw new RequestAuthorizationException(
                'The requested feature not found'
            );

        $this->requestedFeature = $feature;
    }

    /**
     * @return void
     */
    private function setRoleAuthorization()
    {
        $this->roleAuthorization = RoleAuthorization::where(
            'role_id',
            $this->role->id
        )
            ->where('feature_id', $this->requestedFeature->id)
            ->first();
    }

    /**
     * @return \App\Http\Authorizations\Permission
     */
    public function verify()
    {
        if ($this->checkIfRoleHasAllAccessPrivilege()) {
            $this->result = true;
            return $this;
        }

        $this->setRoleAuthorization();

        if ( ! $this->checkIfRoleIsAuthorized()) {
            $this->result = false;
            return $this;
        }

        $this->result = true;
        return $this;
    }

    /**
     * @return \App\Http\Authorizations\Permission
     */
    public function log()
    {
        if (config('log.log_feature')) {
            $featureLog = new FeatureLog;
            $featureLog->user_id = $this->user->id;
            $featureLog->remote_addr = $this->request->ip();
            $featureLog->feature_id = $this->requestedFeature->id;
            $featureLog->success = $this->result;
            $featureLog->save();
        }

        return $this;
    }

    /**
     * @return bool
     */
    private function checkIfRoleHasAllAccessPrivilege()
    {
        return $this->role->all_access;
    }

    /**
     * @return bool
     */
    private function checkIfRoleIsAuthorized()
    {
        if (is_null($this->roleAuthorization)) return false;

        if ( ! $this->roleAuthorization->access) return false;

        return true;
    }

    /**
     * @return bool
     */
    public function result()
    {
        if (is_null($this->result))
            throw new LogicException('The result is not yet settled');

        return $this->result;
    }
}
