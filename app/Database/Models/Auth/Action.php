<?php

namespace App\Database\Models\Auth;

use Illuminate\Eloquent\Database\Model;

class Action extends Model
{
    /**
     * @var bool
     */
    public $timesamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(\App\Database\Models\Auth\Feature::class);
    }
}
