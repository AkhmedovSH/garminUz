<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    protected $table = 'products';
    protected $guarded = [];
    
    use Sluggable;


    public function p_category(){
        return $this->belongsTo(PCategory::class, 'p_category_id', 'id');
    }

    public function p_categories(){
        return $this->belongsToMany(
            PCategory::class,
            'product_categories',
            'product_id',
            'p_category_id'
        );
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
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
