<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
<<<<<<< HEAD
use App\Inboxes;
=======
>>>>>>> 5890259d88e924761a82f87be8a1ff32811f56da

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
<<<<<<< HEAD
        'call_numb',
        'post_id',
=======
        'post_id'
>>>>>>> 5890259d88e924761a82f87be8a1ff32811f56da
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
