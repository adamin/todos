<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents the consept of a task
 */
class Task extends Model {

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'user_id', 'slug', 'status'
    ];

    /**
     * Defines relation with its owner/user
     */
    public function owner() {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Defines relation with its notes
     */
    public function notes() {
        return $this->hasMany('App\Note');
    }

}
