<?php

namespace App\Database\Models\Auth;

use Illuminate\Eloquent\Database\Model;

class Package extends Model
{
    /**
     * @var bool
     */
    public $timesamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function modules()
    {
        return $this->hasMany(\App\Database\Models\Auth\Module::class);
    }
}
