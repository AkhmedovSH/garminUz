<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BCategory extends Model
{
    //
    use Sluggable;
    protected $table = 'book_categories';
    protected $fillable = ['title','parent_id'];
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function p_categories(){
        return $this->belongsToMany(
            PCategory::class,
            'bookproduct_categories',
            'book_category_id',
            'product_category_id'
        );
    }

    public function setTags($ids){
        if ($ids == null){ return; }
        $this->p_categories()->sync($ids);
    }


    public function getTagsTitles(){
        return (!$this->p_categories->isEmpty())
            ? implode(', ', $this->p_categories->pluck('title')->all())
            : 'Нет тегов';
    }
}
