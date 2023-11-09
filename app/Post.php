<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'slug', 'body', 'image', 'user_id'
    ];


    public function auther(){
    	return $this->belongsTo('App\User','user_id');
    }

}
