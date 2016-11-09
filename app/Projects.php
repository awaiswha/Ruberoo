<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';
    protected $primaryKey = 'project_id';

    public function user(){
        return $this->belongsTo('App\User', 'user_idFk', 'user_id');
    }
    public function vote(){
        return $this->hasMany('App\ProjectVotes', 'project_idFk', 'project_id');
    }
    public function size(){
        return $this->hasMany('App\ProjectItems', 'project_idFk', 'project_id');
    }
    public function img(){
        return $this->hasMany('App\ProjectImages', 'project_idFk', 'project_id');
    }
    public function audio(){
        return $this->hasMany('App\ProjectFiles', 'project_idFk', 'project_id');
    }
    public function category(){
        return $this->belongsTo('App\Categories', 'cat_idFk', 'cat_id');
    }

}
