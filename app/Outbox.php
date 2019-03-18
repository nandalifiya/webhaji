<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Outbox extends Model
{
    
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email',
        'description',
        'subject',
        'user_id',
        'post_id',
        'inbox_id'
      ];
  
      /**
       * The attributes that should be hidden for arrays.
       *
       * @var array
       */
      protected $hidden = [];
  
      public function users()
      {
          return $this->hasMany('App\User');
      }
  
      public function posts()
      {
          return $this->hasMany('App\Post');
      }
  
      public function inboxes()
      {
          return $this->hasMany('App\Inbox');
      }

}
