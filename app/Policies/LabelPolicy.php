<?php

namespace App\Policies;

use App\Models\Label;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class LabelPolicy
{
    public function viewAny(?User $user): bool
    {
        return true;
    }

    public function create(User $user): bool
    {
        return Auth::check();
    }

    public function update(User $user, Label $label): bool
    {
        return Auth::check();
    }

    public function delete(User $user, Label $label): bool
    {
        return Auth::check();
    }
}
