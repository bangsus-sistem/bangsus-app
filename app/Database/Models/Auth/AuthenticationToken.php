<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Database\Models\Concerns\Relations\HasUserTimestamps;
use App\Database\Models\Concerns\Timestamp\{
    ExpiredAtTimestamp,
    UsedAtTimestamp,
};

class AuthenticationToken extends Model
{
    use SoftDeletes;

    use HasUserTimestamps;

    use ExpiredAtTimestamp, UsedAtTimestamp;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(\App\Database\Models\Auth\User::class);
    }
}
