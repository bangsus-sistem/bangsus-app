<?php

namespace App\Database\Models\Concerns\Timestamps;

use Illuminate\Support\Facades\Auth;

trait ExpiredAtTimestamp
{
    /**
     * Scope the expired data.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsExpired($query)
    {
        return $query->whereNotNull('expired_at');
    }

    /**
     * Scope the not expired data.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotExpired($query)
    {
        return $query->whereNull('expired_at');
    }

    /**
     * Determine if the row has been expired.
     * 
     * @return bool
     */
    public function hasBeenExpired()
    {
        return ! is_null($this->expired_at);
    }

    /**
     * Determine if the row hasn't been expired.
     * 
     * @return bool
     */
    public function hasntBeenExpired()
    {
        return ! $this->hasBeenExpired();
    }
}
