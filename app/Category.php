<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    protected $fillable = ['title_uz','title_ru'];
    public function posts(){
        return $this->hasMany(Post::class);
    }



    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title_ru'
            ]
        ];
    }
}
