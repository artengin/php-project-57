<?php

namespace App\Policies;

use App\Models\TaskStatus;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TaskStatusPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return Auth::check();
    }

    public function update(User $user, TaskStatus $taskStatus): bool
    {
        return Auth::check();
    }

    public function delete(User $user, TaskStatus $taskStatus): bool
    {
        return Auth::check();
    }
}
