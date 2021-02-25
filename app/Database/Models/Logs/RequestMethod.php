<?php

namespace App\Database\Models\Logs;

use Illuminate\Eloquent\Database\Model;

class RequestMethod extends Model
{
    /**
     * @var bool
     */
    public $timesamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function featureLogs()
    {
        return $this->hasMany(\App\Database\Models\Logs\FeatureLog::class);
    }
}
