<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'post_id', 'author', 'is_active', 'email', 'body', 'photo'
    ];
    
    public function post() { //comment belongs to post
        return $this->belongsTo('App\Post');
    }

    public function replies() { //comment has many replies
        return $this->hasMany('App\CommentReply');
    }
}
