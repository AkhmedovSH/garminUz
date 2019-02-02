<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class BCategory extends Model
{
    use Sluggable;
    protected $table = 'm_categories';
    protected $fillable = ['title','parent_id','image','image2','description'];

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



    function uploadImage($image){
        if ($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10). '.' . $image->extension();

        $image->storeAs('uploads/categories/', $filename);
        $this->image = $filename;
        $this->save();
    }

    public function removeImage(){
        if ($this->image != null){
            Storage::delete('uploads/categories/'. $this->image);
        }
    }

    function uploadImage2($image){
        if ($image == null) { return; }
        $this->removeImage2();
        $filename = str_random(10). '.' . $image->extension();

        $image->storeAs('uploads/categories/', $filename);
        $this->image2 = $filename;
        $this->save();
    }

    public function removeImage2(){
        if ($this->image2 != null){
            Storage::delete('uploads/categories/'. $this->image2);
        }
    }

    public function getImage(){
        if ($this->image == null){
            return '/img/no-image.png';
        }
        return '/uploads/categories/'. $this->image;
    }
    public function getImage2(){
        if ($this->image == null){
            return '/img/no-image.png';
        }
        return '/uploads/categories/'. $this->image2;
    }


    public function remove(){
        $this->removeImage();
        $this->delete();
    }

    public function setProducts($ids){
        if ($ids == null){ return; }
        $this->products()->sync($ids);
    }
    
    public function getProductsTitles($ids){
        return (!$this->products->isEmpty())
            ? implode(', ', $this->products->pluck('title')->all())
            : 'Нет продуктов';
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
