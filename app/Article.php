<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
     protected $attributes = [
        'live' => 1,
        'author_id' =>1 //set this to 1 for now
    ];
    //article table in database
    protected $table = 'article';

    protected $guarded = [];
    public function comments()
    {
        return $this->hasMany('App\Comments', 'on_article');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'author_id');
    }
}
