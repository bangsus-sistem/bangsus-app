<?php

namespace App\Database\Models\Auth;

use Illuminate\Eloquent\Database\Model;

class Module extends Model
{
    /**
     * @var bool
     */
    public $timesamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function package()
    {
        return $this->belongsTo(\App\Database\Models\Auth\Package::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function features()
    {
        return $this->hasMany(\App\Database\Models\Auth\Feature::class);
    }
}
