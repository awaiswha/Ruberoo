<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $primaryKey = 'user_id';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function caption(){
        return $this->belongsTo('App\UserRoles', 'user_role_idFk', 'role_id');
    }
    public function profile(){
        return $this->hasOne('App\UserProfile', 'user_idFk', 'user_id');
    }
    public function allow(){
        return $this->hasMany('App\UserAlloweds', 'user_idFk', 'user_id');
    }
    public function vote(){
        return $this->hasMany('App\ProjectVotes', 'user_idFk', 'user_id');
    }
    public function projects(){
        return $this->hasMany('App\Projects', 'user_idFk', 'user_id');
    }

}
