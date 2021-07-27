<?php

namespace Tests\Feature;

use App\Models\Advert;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    public function test_index()
        {$user = User::factory()->create([
            'role' => 'admin'
        ]);
        $response = $this->actingAs($user)->get('/categories');
        $response->assertStatus(200);
    }

    public function test_store()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);
        $response = $this->actingAs($user)->post(
            '/categories',
            [
                'title' => 'test'
            ]
        );

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    public function test_update()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);
        $category = Category::factory()->create();
        $response = $this->actingAs($user)->put(
            '/categories/' . $category->id,
            [
                'title' => 'updated title',
            ]
        );

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }

    public function test_delete()
    {
        $user = User::factory()->create([
            'role' => 'admin'
        ]);
        $category = Category::factory()->create();
        $response = $this->actingAs($user)->delete('/categories/' . $category->id);

        $response->assertSessionHasNoErrors();
        $response->assertStatus(302);
    }
}
