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
             'name' => 'test name',
             'email' => 'test@mail.ru',
             'role' => 'admin',
             'email_verified_at' => now(),
             'password' => Hash::make('password'),
             'remember_token' => Str::random(10),
         ]);
    }
}
