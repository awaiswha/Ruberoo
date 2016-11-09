<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectVotes extends Model
{
    protected $table = 'project_votes';
    protected $primaryKey = 'vot_id';

    public function user(){
        return $this->belongsTo('App\User', 'user_idFk', 'user_id');
    }
    public function owner(){
        return $this->belongsTo('App\User', 'project_owner', 'user_id');
    }
    public function project(){
        return $this->belongsTo('App\Projects', 'project_idFk', 'project_id');
    }

}
