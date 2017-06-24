<?php

namespace TaskManager\Policies;

use Hamcrest\SampleSelfDescriber;
use Psy\Util\Str;
use TaskManager\User;
use TaskManager\Tasks;
use Illuminate\Auth\Access\HandlesAuthorization;

class TasksPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the tasks.
     *
     * @param  \TaskManager\User  $user
     * @param  \TaskManager\Tasks  $tasks
     * @return mixed
     */
    public function view(User $user, Tasks $tasks)
    {
       return dd($tasks);

    }

    /**
     * Determine whether the user can create tasks.
     *
     * @param  \TaskManager\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        if ($user->active)
            return true;

        else
            return false;
    }


    /**
     * Determine whether the user can update the tasks.
     *
     * @param  \TaskManager\User  $user
     * @param  \TaskManager\Tasks  $tasks
     * @return mixed
     */
    public function update(User $user, Tasks $task)
    {
        if($user->id == $task->user_id){
            return true;
        }
        else{
            return false;
        }
    }

    /**
     * Determine whether the user can delete the tasks.
     *
     * @param  \TaskManager\User $user
     * @param Tasks $id
     * @return mixed
     * @internal param Tasks $tasks
     */
    public function delete(User $user, Tasks $id)
    {

        if($user->id == $id->user_id){
            return true;
        }
        else{
            return false;
        }

    }
}
