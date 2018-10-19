<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    
    protected $fillable = [
        'file'
    ];

    //displaying photos using accessor !!!
    protected $uploads = '/images/';

    public function getFileAttribute($photo) { //because of "file"
        return $this->uploads . $photo;
    }

}
