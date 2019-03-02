<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class inbox extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'post_id'
      ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    public function outboxes()
    {
        return $this->belongsTo('App\Outbox');
    }
}
