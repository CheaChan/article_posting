<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'slug', 'title', 'published_at', 'category_id', 'content', 'amount_viewer', 'video_link', 'user_id'
    ];

    public function categories()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }
    public function articlePhoto()
    {
        return $this->hasMany('App\Models\ArticlePhoto', 'article_id');
    }

    public function articlePhotoFisrt()
    {
        return $this->hasMany('App\Models\ArticlePhoto', 'article_id');
    }

}
