<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Product extends Model
{
    protected $table = 'products';
    protected $fillabe = ['title', 'description'];
    
    use Sluggable;

    
    public function p_categories(){
        return $this->belongsToMany(
            BCategory::class,
            'm_category_product',
            'product_id',
            'm_category_id'
        );
    }
    public function p_filters(){
        return $this->belongsToMany(
            PCategory::class,
            'p_filter_product',
            'product_id',
            'p_filter_id'
        );
    }

    public function p_filters2(){ // for count opposite of filters
        return $this->belongsToMany(
            Product::class,
            'p_filter_product',
            'p_filter_id',
            'product_id'
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

    public static function add($fields){
        $product = new static;
        $product->title = $fields['title'];
        $product->description = $fields['description'];
        $product->save();

        return $product;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        //$this->removeImage();
        $this->delete();
    }

    public function setTags($ids){
        if ($ids == null){ return; }
        $this->p_categories()->sync($ids);
    }

    public function setFilters($ids){
        if ($ids == null){ return; }
        $this->p_filters()->sync($ids);
    }


    public function getTagsTitles(){
        return (!$this->p_categories->isEmpty())
            ? implode(', ', $this->p_categories->pluck('title')->all())
            : 'Нет тегов';
    }
}
