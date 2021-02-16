<?php

namespace App\Database\Models\Concerns\Relations;

use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

trait HasUserDelete
{
    /**
     * @return void
     */
    public static function bootHasUserDelete()
    {
        static::deleting(function ($model) {
            $model->user_delete_id = Auth::user()->id;
            $model->saveQuietly();
        });

        static::restoring(function ($model) {
            $model->created_at = Carbon::now();
            $model->updated_at = null;
            $model->user_create_id = Auth::user()->id;
            $model->user_update_id = Auth::user()->id;
            $model->user_delete_id = null;
            $model->saveQuietly();
        });
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function userDelete()
    {
        return $this->belongsTo(\App\Database\Models\Auth\User::class);
    }
}
