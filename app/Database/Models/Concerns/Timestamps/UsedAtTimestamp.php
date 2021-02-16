<?php

namespace App\Database\Models\Concerns\Timestamps;

use Illuminate\Support\Facades\Auth;

trait UsedAtTimestamp
{
    /**
     * @return void
     */
    public static function bootUsedAtTimestamp()
    {
        static::updating(fn ($model) => ! $model->hasBeenUsed());
    }

    /**
     * @return void
     */
    public function initializeUsedAtTimestamp()
    {
        $this->addObservableEvents([
            'using', 'used', 'unusing', 'unused'
        ]);
    }
    
    /**
     * Use the data row.
     * 
     * @return mixed
     */
    public function use()
    {
        $this->fireModelEvent('using');

        $this->used_at = $this->freshTimestamp();
        $result = $this->saveQuietly();

        $this->fireModelEvent('used', false);

        return $result;
    }

    /**
     * Unuse the data row.
     * 
     * @return mixed
     */
    public function unuse()
    {
        $this->fireModelEvent('unusing');

        $this->used_at = null;
        $result = $this->saveQuietly();

        $this->fireModelEvent('unused', false);

        return $result;
    }

    /**
     * Scope the used data.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsUsed($query)
    {
        return $query->whereNotNull('used_at');
    }

    /**
     * Scope the not used data.
     * 
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsNotUsed($query)
    {
        return $query->whereNull('used_at');
    }

    /**
     * Determine if the row has been used.
     * 
     * @return bool
     */
    public function hasBeenUsed()
    {
        return ! is_null($this->used_at);
    }

    /**
     * Determine if the row hasn't been used.
     * 
     * @return bool
     */
    public function hasntBeenUsed()
    {
        return ! $this->hasBeenUsed();
    }

    /**
     * Register a "using" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function using($callback)
    {
        static::registerModelEvent('using', $callback);
    }

    /**
     * Register a "used" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function used()
    {
        static::registerModelEvent('used', $callback);
    }

    /**
     * Register a "unusing" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function unusing($callback)
    {
        static::registerModelEvent('unusing', $callback);
    }

    /**
     * Register a "unused" model event callback with the dispatcher.
     * 
     * @param  \Closure|string  $callback
     * @return void
     */
    public static function unused()
    {
        static::registerModelEvent('unused', $callback);
    }
}
