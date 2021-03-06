<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'title','description','img','category_id','user_id'
    ];
    public function comments(){
    return $this->morphMany('App\Comment','commendable');
    }
    public function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public function  user(){
        return $this->belongsTo('App\User');
    }


}

