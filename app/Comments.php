<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{

    //article table in database
    protected $table = 'comments';

    protected $guarded = [];

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

     public function source()
    {
        return $this->belongsTo('App\Article', 'article_id');
    }
}
