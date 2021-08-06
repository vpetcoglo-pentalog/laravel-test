<?php

namespace App\Http\Controllers;

use App\Http\Requests\Profile\ProfileUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController
{
    public function index()
    {
        $userData = Auth::user();

        return view('settings', compact('userData'));
    }

    public function update(ProfileUpdateRequest $request)
    {
        $data = $request->validated();

        $user = Auth::user();
        $user->name = $data['name'];

        if (isset($data['avatar'])) {
            if ($user->avatar) {
                Storage::delete($user->avatar);
            }

            $path = $request->file('avatar')->store('upload/avatars');
            $user->avatar = $path;
        }

        if (isset($data['password'])) {
            if (!isset($data['old_password']) || !Hash::check($data['old_password'], Auth::user()->password)) {
                return redirect()->back()->withErrors('The password does not match.');
            }

            $user->password = Hash::make($data['password']);
        }

        $user->save();

        return redirect()->back()->with('message', 'Success');
    }
}
