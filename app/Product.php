<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Support\Facades\Storage;
class Product extends Model
{
    protected $table = 'products';
    protected $fillabe =
    ['title', 'notice', 'description', 'part_number',
     'image', 'slider_image', 'featured', 'price',
     'sale', 'status', 'pa_size', 'pa_case_size',
     'pa_pulse_ox', 'pa_saphire', 'pa_music', 'overview',
     'overview', 'specs', 'in_the_box'
    ];
    
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

    public function productGroup(){
        return $this->belongsTo(ProductGroup::class, 'series_category_id', 'id');
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
        $product->series_category_id = $fields['series_category_id'];
        $product->notice = $fields['notice'];
        $product->description = $fields['description'];
        $product->part_number = $fields['part_number'];

        if(isset($fields['featured'])){ $product->featured = $fields['featured']; }
        
        $product->price = $fields['price'];
        $product->sale = $fields['sale'];

        $product->overview = $fields['overview'];
        $product->specs = $fields['specs'];
        $product->in_the_box = $fields['in_the_box'];
        $product->save();

        return $product;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        $this->removeImage();
        $this->removeSliderImages();
        $this->p_filters()->detach();
        $this->p_categories()->detach();
        $this->delete();
    }

    public function removeSliderImages(){
        if ($this->slider_image != null){
            $images = json_decode($this->slider_image, true);
            foreach($images as $item){
                Storage::delete('uploads/products/'. $item['image']);
            }
        }
    }
    public function removeImage(){
        if ($this->image != null){
            Storage::delete('uploads/products/'. $this->image);
        }
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


    function uploadImage($image){
        if ($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10). '.' . $image->extension();

        $image->storeAs('uploads/products/', $filename);
        $this->image = $filename;
        $this->save();
    }


    public function getImage(){
        if ($this->image == null){
            return '/img/no-image.png';
        }
        return '/uploads/products/'. $this->image;
    }

    public function uploadMultipleImages($images){
    if ($images == null) { return; }
    $names = array();
    $incI = 0;
    foreach($images as $image)
    {
        $filename = str_random(10). '.' . $image->extension();
        $image->storeAs('uploads/products/', $filename);
        //array_push($names, $filename);  
        $names[$incI]['image'] = $filename;
        $incI++;
        
    }
        $this->slider_image = json_encode($names);
        $this->save();
    }
}
