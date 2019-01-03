<?php

namespace App\Policies;

use App\User;
use App\Solution;
use Illuminate\Auth\Access\HandlesAuthorization;

class SolutionPolicy
{
    use HandlesAuthorization;


    public function crud(User $user)
    {
        return $this->getPermission($user,25);
    }

    /**
     * Determine whether the user can view the solution.
     *
     * @param  \App\User  $user
     * @param  \App\Solution  $solution
     * @return mixed
     */
    public function view(User $user)
    {
        return $this->getPermission($user,15);
    }

    /**
     * Determine whether the user can create solutions.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the solution.
     *
     * @param  \App\User  $user
     * @param  \App\Solution  $solution
     * @return mixed
     */
    public function update(User $user)
    {
        return $this->getPermission($user,16);
    }

    /**
     * Determine whether the user can delete the solution.
     *
     * @param  \App\User  $user
     * @param  \App\Solution  $solution
     * @return mixed
     */
    public function delete(User $user)
    {
        return $this->getPermission($user,17);
    }

    public function access(User $user)
    {
        return $this->getPermission($user,18);
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
