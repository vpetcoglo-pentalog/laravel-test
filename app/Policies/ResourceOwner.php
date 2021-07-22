<?php

namespace App\Policies;

use App\Enums\UserTypes;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;

class ResourceOwner
{
    use HandlesAuthorization;

    public function owner(User $user, Model $resource): bool
    {
        return $user->id === $resource->user_id || $user->role === UserTypes::ADMIN;
    }
}
