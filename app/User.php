<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Represent a concept of the site user
 */
class User extends Authenticatable
{
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
     * Defines a relation with tasks owned by the user
     */
    public function tasks() {
        return $this->hasMany('App\Task');
    }
}
