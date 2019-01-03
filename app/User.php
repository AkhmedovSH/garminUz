<?php

namespace App;

use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Contracts\Auth;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use Notifiable;
    use LaratrustUserTrait; // add this trait to your user model

    const IS_BANNED = 1;
    const IS_ACTIVE = 0;
    public function solutions()
    {
        return $this->belongsToMany(
            Solution::class,
            'user_solution',
            'user_id',
            'solution_id'
        );
    }

    protected $fillable = [
        'name', 'email', 'lesson_checker', 'provider_id', 'provider', 'about','firstname','lastname','college','highschool','biography','shortinfo',
    ];

    protected $hidden = [
        'password', 'remember_token', 'email','provider_id', 'provider', 'created_at', 'updated_at', 'ban', 'status'
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public static function add($fields)
    {
        $user = new static;
        $user->fill($fields);
        $user->save();

        return $user;
    }

    public function edit($fields)
    {
        $this->fill($fields); //name,email

        $this->save();
    }

    public function generatePassword($password)
    {
        if($password != null)
        {
            $this->password = bcrypt($password);
            $this->save();
        }
    }

    public function remove()
    {
        $this->removeAvatar();
        $this->delete();
    }

    public function uploadAvatar($image)
    {
        if($image == null) { return; }

        $this->removeAvatar();
        $filename = str_random(10) . '.' . $image->extension();
        $img = Image::make($image)->resize(150, 150);
        $img->save('uploads/avatars/' . $filename);
        $this->avatar = $filename;
        $this->save();
    }

    public function removeAvatar()
    {
        if($this->avatar != null)
        {
            Storage::delete('uploads/avatars/' . $this->avatar);
        }
    }

    public function getImage()
    {
        if($this->avatar == null)
        {
            return '/img/no-image.png';
        }

        return '/uploads/avatars/' . $this->avatar;
    }



    public function isBanned() // isBanned middleware checks this and give access
    {
    if ( $this->ban != 1) {
        return true;
    } else {
        return false;
    }
    }

    public function isSubscriber() // Subscriber middleware checks this and give access
    {
        if ( $this->subscriber == 1) {
            return true;
        } else {
            return false;
        }
    }

    public function toggleBan(){// User ban and unban system
        if ($this->ban == 0){
            $this->ban();
        }else{
            $this->unban();
        }
    }
    
    public function ban(){
    $this->ban = 1;
        $this->save();
    }

    public function unban(){
        $this->ban = 0;
        $this->save();
    }


}
