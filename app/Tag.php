<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    const TABLE = 'tags';

    protected $table = self::TABLE;

    protected $fillable = [
    	'name', 'slug'
    ];

    public static function search($search) {
    	return empty($search)
    	? static::query()
    	: static::query()->where('id','like', '%'.$search.'%')
    	->orWhere('name','like', '%'.$search.'%')
    	->orWhere('slug','like', '%'.$search.'%');
	}
}
