<?php

namespace App\Database\Models\Concerns\Relations;

use Illuminate\Support\Facades\Auth;

trait HasRole
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(\App\Database\Models\Auth\Role::class);
    }
}
