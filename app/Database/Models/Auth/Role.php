<?php

namespace App\Database\Models\Auth;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Database\Models\Concerns\Relations\{
    HasUserTimestamps,
    HasUserDelete,
};

class Role extends Model
{
    use SoftDeletes;

    use HasUserTimestamps, HasUserDelete;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function user()
    {
        return $this->hasMany(\App\Database\Models\Auth\User::class);
    }
}
