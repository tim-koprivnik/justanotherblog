<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use Sluggable;
    use SluggableScopeHelpers;
    use Searchable;

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title',
            ]
        ];
    }

    protected $fillable = [
        'user_id', 'photo_id', 'category_id', 'title', 'body', 'slug'
    ];

    public function user() { //post belongs to user (user has many posts)
        return $this->belongsTo('App\User');
    }

    public function photo() { //post belongs to photo (?)
        return $this->belongsTo('App\Photo');
    }

    public function category() { //post belongs to category
        return $this->belongsTo('App\Category');
    }

    public function comments() { //post has many comments
        return $this->hasMany('App\Comment');
    }

}
