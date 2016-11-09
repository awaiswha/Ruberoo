<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deals extends Model
{
    protected $table = 'deals';
    protected $primaryKey = 'deal_id';

    public function buyer(){
        return $this->belongsTo('App\User', 'buyer_idFk', 'user_id');
    }
    public function seller(){
        return $this->belongsTo('App\User', 'seller_idFk', 'user_id');
    }
    public function project(){
        return $this->belongsTo('App\Projects', 'project_idFk', 'project_id');
    }
}
