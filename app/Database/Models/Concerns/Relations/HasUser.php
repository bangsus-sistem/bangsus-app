<?php

namespace App\Database\Models\Concerns\Relations;

use Illuminate\Support\Facades\Auth;

trait HasUser
{
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(\App\Database\Models\Auth\User::class);
    }
}
