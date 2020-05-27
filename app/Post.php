<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'content','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function favorited()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'post_id', 'user_id')->withTimestamps();
    }  
   

}
