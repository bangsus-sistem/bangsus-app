<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\Model;
use App\Database\Models\Concerns\Relations\{
    HasRole,
    HasUserTimestamps,
};

class RoleFeature extends Model
{
    use HasRole, HasUserTimestamps;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function feature()
    {
        return $this->belongsTo(\App\Database\Models\Auth\Feature::class);
    }
}
