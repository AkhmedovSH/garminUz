<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Cviebrock\EloquentSluggable\Sluggable;

class Post extends Model
{
    use Sluggable;


    const IS_DRAFT = 0;
    const IS_PUBLIC =1;

    protected $fillable =['title', 'content', 'description'];



    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function parentComments()
    {
        return $this->comments()->where('commentable_id', null);
    }

    public function tags(){
        return $this->belongsToMany(
            Tag::class,
            'post_tags',
            'post_id',
            'tag_id'
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
        $post = new static;
        $post->fill($fields);
        $post->user_id = Auth::user()->id;
        $post->save();

        return $post;
    }

    public function edit($fields){
        $this->fill($fields);
        $this->save();
    }

    public function remove(){
        $this->removeImage();
        $this->delete();
    }
    
    public function removeImage(){
        if ($this->image != null){
            Storage::delete('uploads/posts/'. $this->image);
            Storage::delete('uploads/posts/'. $this->thubnail);
        }
    }

    function uploadImage($image){
        
        if ($image == null) { return; }
        $this->removeImage();
        $filename = str_random(10). '.' . $image->extension();
        $filenameThubnail = str_random(10). '.' . $image->extension();

        $img = Image::make($image)->resize(340, 300);
        $img->save('uploads/posts/' . $filenameThubnail); 
        //dd($img);

        $image->storeAs('uploads/posts/', $filename);
        $this->image = $filename;
        $this->thubnail = $filenameThubnail;
        $this->save();
    }


    public function getImage(){
        if ($this->image == null){
            return '/img/no-image.png';
        }
        return '/uploads/posts/'. $this->image;
    }

    public function setCategory($id){
        if ($id == null){ return; }
        $this->category_id = $id;
        $this->save();
    }

    public function setTags($ids){
        if ($ids == null){ return; }
        $this->tags()->sync($ids);
    }

    public function setDraft(){
        $this->status = Post::IS_DRAFT;
        $this->save();
    }

    public function setPublic(){
        $this->status = Post::IS_PUBLIC;
        $this->save();
    }

    public function toggleStatus($value){
        if ($value==null){
            return $this->setDraft();
        }else{
            return $this->setPublic();
        }
    }

    public function setFetured(){
        $this->is_featured = 1;
        $this->save();
    }

    public function setStandart(){
        $this->is_featured = 0;
        $this->save();
    }

    public function toggleFeatured($value){
        if ($value==null){
            return $this->setStandart();
        }else{
            return $this->setFetured();
        }
    }
    public function setDateAttribute($value)
    {

        $date = Carbon::createFromFormat('d/m/y', $value)->format('y-m-d');
        $this->attributes['date'] = $date;
    }

    public function getDateAttribute($value)
    {
        $date = Carbon::createFromFormat('Y-m-d', $value)->format('d/m/y');
        return $date;
    }

    public function getCategoryTitle(){
        return ($this->category != null)
            ? $this->category['title_ru']
            : 'Нет категории';
    }

    public function getAuthor(){
        return $this->author != null ? $this->author->name : 'Admin';
    }
    public function getAuthorAbout(){
        return $this->author->about;
    }
    public function getAuthorAvatar(){
        return $this->author->getImage();
    }


    public function getTagsTitles(){
        return (!$this->tags->isEmpty())
            ? implode(', ', $this->tags->pluck('title')->all())
            : 'Нет тегов';
    }

    public function getCategoryID(){
        return $this->category != null ? $this->category->id : null;
    }

    public function getDate(){
        return Carbon::createFromFormat('d/m/y', $this->date)->format('F d, Y');
    }

    public function hasPrevious(){
        return self::where('id', '<' , $this->id)->max('id');
    }

    public function hasNext(){
        return self::where('id', '>' , $this->id)->min('id');
    }

    public function getPrevious(){
        $postID = $this->hasPrevious();
        return self::find($postID);
    }

    public function getNext(){
        $postID = $this->hasNext();
        return self::find($postID);
    }

    public function related(){
        return self::all()->except($this->id);
    }

    public function hasCategory(){
        return $this->category != null ? true : false;
    }

    public static function getPopularPosts()
    {
        return self::orderBy('views','desc')->take(3)->get();
    }

    public function getComments()
    {
        return $this->comments()->where('status', 0)->get();
    }

    public function getAbsolutePath()
    {
        //dd(asset('uploads/posts/'. $this->image));
        return asset('uploads/posts/'. $this->image);
    }

    public function scopeFilter($query, $filters){
        if ($filters == null)
        {
            $query;
        }else{
            $year = $filters['year'];
            $query->whereYear('created_at', $year);
        }
    }

    public static function archives(){
        return static::selectRaw('year(created_at) year,monthname(created_at) month,count(*) published')
            ->groupBy('year', 'month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }
}
