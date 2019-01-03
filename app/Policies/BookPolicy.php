<?php

namespace App\Policies;

use App\User;
use App\Book;
use Illuminate\Auth\Access\HandlesAuthorization;

class BookPolicy
{
    use HandlesAuthorization;

    public function crud(User $user)
    {
        return $this->getPermission($user,24);
    }

    public function bcategory(User $user)
    {
        return $this->getPermission($user,20);
    }
    /**
     * Determine whether the user can view the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getPermission($user,12);
    }

    /**
     * Determine whether the user can create books.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        return $this->getPermission($user,11);
    }

    /**
     * Determine whether the user can update the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getPermission($user,13);
    }

    /**
     * Determine whether the user can delete the book.
     *
     * @param  \App\User  $user
     * @param  \App\Book  $book
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->getPermission($user,14);
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
