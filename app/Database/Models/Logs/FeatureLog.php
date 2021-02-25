<?php

namespace App\Database\Models\Logs;

use Illuminate\Database\Eloquent\{
    Model,
    SoftDeletes,
};
use App\Database\Models\Concerns\Relations\{
    HasUser,
    HasUserDelete,
};

class AuthenticationLog extends Model
{
    use SoftDeletes;

    use HasUser, HasUserDelete;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function requestMethod()
    {
        return $this->belongsTo(\App\Database\Models\Logs\RequestMethod::class);
    }
}
