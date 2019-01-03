<?php

namespace App;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class PCategory extends Model
{
    protected $table = 'p_categories';
    protected $guarded = [];
    
    use Sluggable;
    public function many_products(){
        return $this->hasMany(Product::class);
    }

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_categories',
            'p_category_id',
            'product_id'
        );
    }

    public function bcategories()
    {
        return $this->belongsToMany(
            BCategory::class,
            'bookproduct_categories',
            'product_category_id',
            'book_category_id'
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
