<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;

class BCategory extends Model
{
    use Sluggable;
    protected $table = 'm_categories';
    protected $fillable = ['title','parent_id'];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function filters(){
        return $this->hasMany(PCategory::class);
    }
    
    public function products(){ //ProductController to get products
        return $this->belongsToMany(
            Product::class,
            'm_category_product',
            'm_category_id',
            'product_id'
        );
    }

    public function p_categories(){ //ProductController to get series
        return $this->belongsToMany(
            PCategory::class,
            'm_category_p_filter',
            'm_category_id',
            'p_filter_id'
        );
    }
    public function p_categories2(){ //ProductController to get features 
        return $this->belongsToMany(
            PCategory::class,
            'm_category_p_filter',
            'm_category_id',
            'p_filter_id'
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

}
