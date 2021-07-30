<?php

namespace Database\Seeders;

use App\Models\Advert;
use App\Models\Category;
use App\Models\Comment;
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

        Category::factory()->count(30)->create();
        Advert::factory()->count(1000)->create();
        Comment::factory()->count(400)->create();
    }
}
