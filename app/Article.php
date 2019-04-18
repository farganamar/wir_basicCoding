<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //
    protected $fillable = [
        'category_id', 'title', 'slug', 'content' , 'banner'
    ];



    public function kategori()
    {
        return $this->belongsTo('App\Category', 'category_id');
    }

    public function author()
    {
        return $this->belongsTo('App\User', 'user_id');
    }
}
