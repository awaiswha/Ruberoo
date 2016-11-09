<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLikes extends Model
{
    protected $table = 'user_likes';
    protected $primaryKey = 'like_id';
}
