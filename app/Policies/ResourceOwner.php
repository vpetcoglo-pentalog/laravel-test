<?php

namespace App\Policies;

use App\Enums\UserTypes;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

class ResourceOwner
{
    use HandlesAuthorization;

    public function owner(Model $resource): bool
    {
        dump('$resource');
        dump($resource);
        dd(Auth::id());

        return Auth::id() === $resource->user_id || Auth::user()->role === UserTypes::ADMIN;
    }
}
