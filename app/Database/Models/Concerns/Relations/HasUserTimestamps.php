<?php

namespace App\Database\Models\Concerns\Relations;

use Illuminate\Support\Facades\Auth;

trait HasUserTimestamps
{
    /**
     * @return void
     */
    public static function bootHasUserTimestamps()
    {
        static::creating(function ($model) {
            $model->user_create_id = Auth::user()->id;
        });
        static::updating(function ($model) {
            $model->user_update_id = Auth::user()->id;
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userCreate()
    {
        return $this->belongsTo(\App\Database\Models\Auth\User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userUpdate()
    {
        return $this->belongsTo(\App\Database\Models\Auth\User::class);
    }
}
