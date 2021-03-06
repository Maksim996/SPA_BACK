<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable, HasFactory;

    const DIRECTOR = 2;
    const ADMIN = 3;
    const ACTIVE = 1;
    const DEACTIVATE = 0;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
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
     * Get user role
     */
    public function role()
    {
        return $this->belongsTo('App\Models\Role');
    }

    /**
     * Get user info associated with the user.
     */
    public function info()
    {
        return $this->hasOne('App\Models\Info');
    }

    /**
     * Scope a query to only include users with role Director.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeIsDirector($query)
    {
        return $query->where('role_id', 2);
    }

    /**
     * Change user status
     *
     * @param [boolean] $active
     * @return boolean
     */
    public static function switchStatus(bool $active) :bool
    {
        return $active ? self::DEACTIVATE : self::ACTIVE;
    }
}
