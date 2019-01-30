<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;

class ProductGroup extends Model
{

    protected $table = 'product_group';
    protected $guarded = [];
    
    public function products(){
        return $this->hasMany(Product::class, 'id','series_category_id');
    }

    use Sluggable;
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
        $product->save();
        return $product;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }
}
