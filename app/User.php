<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id', 'name', 'email', 'password', 'is_active', 'photo_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

//encrypting password
    // public function setPasswordAttribute($value) {
    //     return $this->attributes['password'] = bcrypt($value);
    // }
    
    //relationships
    public function role() { //user belongs to a role
        return $this->belongsTo('App\Role');
    }

    public function photo() { //user belongs to a photo
        return $this->belongsTo('App\Photo');
    }

    public function isAdmin() {
        if($this->role->name == 'Admin') {
            return true;
        }
        return false;
    }

    public function posts() { //user has many posts
        return $this->hasMany('App\Post');
    }

    public function getGravatarAttribute() {
        $hash = md5(strtolower(trim($this->attributes['email']))) . "?d=mm";

        return "http://www.gravatar.com/avatar/$hash";
    }
    
}
