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
         \App\Models\User::factory(10)->create([
             'name' => 'vvv',
             'email' => 'test2@mail.ru',
             'role' => 'admin',
             'email_verified_at' => now(),
             'password' => '$2y$10$VVEDRA.KiV7lk.a6nVoK7eYrpK4SNgmXbueYC85GAPBhcXMuePI7a',
             'remember_token' => Str::random(10),
         ]);
    }
}
