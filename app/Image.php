<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{

	 protected $fillable = ['name', 'extension', 'article_id'];
    
    public function article()
    {
        return $this->belongsTo('App\Article');
    }
}
