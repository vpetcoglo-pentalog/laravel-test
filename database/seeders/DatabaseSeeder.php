<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
             'name' => 'Test name',
             'email' => 'test@mail.ru',
             'role' => 'admin',
             'email_verified_at' => now(),
             'password' => '$2y$10$6SsynhXnp90mhTf41kdyFu3DwxmEwd9uwjc4T6z', //5SrBs7xNTz6DfBf
             'remember_token' => Str::random(10),
         ]);
    }
}
