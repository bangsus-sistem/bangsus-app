<?php

namespace App\Database\Models\Auth;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Database\Models\Concerns\Relations\{
    HasRole,
    HasUserTimestamps,
    HasUserDelete,
};

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    use SoftDeletes;

    use HasRole, HasUserTimestamps, HasUserDelete;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\HasMany
     */
    public function authenticationTokens()
    {
        return $this->hasMany(\App\Database\Models\Auth\AuthenticationToken);
    }

    /**
     * @return \Illuminate\Database\Eloquent\HasMany
     */
    public function authenticationLogs()
    {
        return $this->hasMany(\App\Database\Models\Logs\AuthenticationLog);
    }
}
