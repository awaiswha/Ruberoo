<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAlloweds extends Model
{
    protected $table = 'user_alloweds';
    protected $primaryKey = 'allowed_id';

    public function user(){
        return $this->belongsTo('App\User', 'user_idFk', 'user_id');
    }
}
