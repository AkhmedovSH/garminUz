<?php

namespace App\Policies;

use App\User;
use App\Post;
use Illuminate\Auth\Access\HandlesAuthorization;

class PostPolicy
{
    use HandlesAuthorization;


    public function crud(User $user)
    {
        return $this->getPermission($user,23);
    }

    public function tag(User $user)
    {
        return $this->getPermission($user,22);
    }

    public function comments(User $user)
    {
        return $this->getPermission($user,21);
    }

    public function category(User $user)
    {
        return $this->getPermission($user,19);
    }
    /**
     * Determine whether the user can view the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getPermission($user,6);
    }

    /**
     * Determine whether the user can create posts.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->getPermission($user,5);
    }

    /**
     * Determine whether the user can update the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getPermission($user,7);
    }

    /**
     * Determine whether the user can delete the post.
     *
     * @param  \App\User  $user
     * @param  \App\Post  $post
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->getPermission($user,8);
    }

    protected function getPermission($user,$permission_id){

        foreach ($user->roles as $role){
            foreach ($role->permissions as $permission){
                if($permission->id == $permission_id){
                    return true;
                }
            }
        }
        return false;
    }
}
