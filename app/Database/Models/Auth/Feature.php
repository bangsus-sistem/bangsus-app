<?php

namespace App\Database\Models\Auth;

use Illuminate\Eloquent\Database\Model;

class Feature extends Model
{
    /**
     * @var bool
     */
    public $timesamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function module()
    {
        return $this->belongsTo(\App\Database\Models\Auth\Module::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function action()
    {
        return $this->belongsTo(\App\Database\Models\Auth\Action::class);
    }
}
