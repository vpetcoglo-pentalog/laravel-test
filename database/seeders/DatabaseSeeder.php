<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::create([
             'name' => 'vvv',
             'email' => 'test2@mail.ru',
             'role' => 'admin',
             'email_verified_at' => now(),
             'password' => Hash::make('pass'),
             'remember_token' => Str::random(10),
         ]);
    }
}
