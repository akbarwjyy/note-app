<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;

class TaskPolicy
{
    /**
     * Determine whether the user can view any models.
     */
    public function viewAny(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can view the model.
     * 
     * @param User $user
     * @param Task $task
     * @return bool
     * @phpstan-ignore-next-line
     */
    public function view(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    /**
     * Determine whether the user can create models.
     */
    public function create(User $user): bool
    {
        return true;
    }

    /**
     * Determine whether the user can update the model.
     * 
     * @param User $user
     * @param Task $task
     * @return bool
     * @phpstan-ignore-next-line
     */
    public function update(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    /**
     * Determine whether the user can delete the model.
     * 
     * @param User $user
     * @param Task $task
     * @return bool
     * @phpstan-ignore-next-line
     */
    public function delete(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    /**
     * Determine whether the user can restore the model.
     * 
     * @param User $user
     * @param Task $task
     * @return bool
     * @phpstan-ignore-next-line
     */
    public function restore(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }

    /**
     * Determine whether the user can permanently delete the model.
     * 
     * @param User $user
     * @param Task $task
     * @return bool
     * @phpstan-ignore-next-line
     */
    public function forceDelete(User $user, Task $task): bool
    {
        return $task->user_id === $user->id;
    }
}
