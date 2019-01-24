<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PCategory extends Model
{
    protected $table = 'p_filters';
    protected $fillable = ['title','filter_type'];
    
    use Sluggable;
    
/*     public function menu_category(){
        return $this->belongsTo(BCategory::class,'menu_category_id', 'id');
    } */

    public function menu_categories(){
        return $this->belongsToMany(
            BCategory::class,
            'm_category_p_filter',
            'p_filter_id',
            'm_category_id'
        );
    }
    

    

    public function filter_products(){ // for count opposite of filters
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
        $category = new static;
        $category->fill($fields);
        $category->save();

        return $category;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function setTags($ids){
        if ($ids == null){ return; }
        $this->menu_categories()->sync($ids);
    }


    public function getTagsTitles(){
        return (!$this->menu_categories->isEmpty())
            ? implode(', ', $this->menu_categories->pluck('title')->all())
            : 'Нет тегов';
    }
}
