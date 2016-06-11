<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Represents the concept of a task note
 */
class Note extends Model {

    /**
     * The attributes that are mass assignable
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'user_id', 'task_id', 'slug'
    ];

    /**
     * Defines a relation with a task
     */
    public function task() {
        return $this->belongsTo('App\Task');
    }

    /**
     * Defines a relation with an author/user
     */
    public function author() {
        return $this->belongsTo('App\User', 'user_id');
    }

}
