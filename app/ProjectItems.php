<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectItems extends Model
{
    protected $table = 'project_items';
    protected $primaryKey = 'item_id';

    public function size(){
        return $this->belongsTo('App\SizeCategories', 's_cat_idFk', 's_cat_id');
    }

}
