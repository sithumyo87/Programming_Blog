<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LikesDislike extends Model
{
    protected $fillable = [
        'user_id','post_id','type'
    ];
}
