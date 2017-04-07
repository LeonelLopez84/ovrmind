<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $fillable = ['title', 'extension', 'user_id'];

	public function user()
    {
        return $this->belongsTo('App\User');
    }
   
   public function images()
	{
		return $this->hasMany('App\Image');	
	}
}
