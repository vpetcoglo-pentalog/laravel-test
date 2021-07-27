<?php

namespace App\Policies;

use App\Enums\UserTypes;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ResourceOwner
{
    use HandlesAuthorization;

    public function owner(Model $resource): bool
    {
        return Auth::id() === $resource->user_id || Auth::user()->role === UserTypes::ADMIN;
    }
}
