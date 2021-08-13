<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'hobbies', 'gender', 'role', 'profile_picture'
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

     * Set the hobbies

     *

     */

    public function setHobbiesAttribute($value)
    {
        $this->attributes['hobbies'] = json_encode($value);
    }

    /**

     * Get the hobbies

     *

     */

    public function getHobbiesAttribute($value)
    {
        return $this->attributes['hobbies'] = json_decode($value);
    }
}
