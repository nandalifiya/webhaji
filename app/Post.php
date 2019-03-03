<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;

class Post extends Model
{
  /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
      'title',
      'description',
      'price',
      'filename',
      'mime',
      'original_filename',
      'user_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function inboxes()
    {
        return $this->belongsTo('App\Inbox');
    }
  
    public function outboxes()
    {
        return $this->belongsTo('App\Outbox');
    }

}
